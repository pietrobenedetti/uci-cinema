<template>
    <div class="w-full h-full flex bg-indigo-900 justify-item-center">
        <div class="w-1/3 m-w-450 m-auto mt-10 h-auto rounded-lg bg-white py-8 px-7">
            <h1 class="text-4xl font-bold text-gray-600 text-center">Create a new projection</h1>
            <hr class="border-3 border-black mt-5 mb-5">
            <div class="w-full mt-6">
                <h1 class="text-gray-700">Quando?</h1>
                <div class="w-full border rounded-lg mt-3">
                    <input type="date" v-model="projection.date" class="w-full py-2.5 px-4 rounded-lg bg-gray-100 focus:shadow focus:bg-white focus:outline-none" id="titolo" placeholder="titolo" required/>
                </div>
                <div class="block mt-3">
                    <span class="text-gray-700 ">Proiezione il 3d?</span>
                    <div class="mt-2">
                        <div>
                        <label class="inline-flex items-center">
                            <input v-model="projection.tre_d" type="radio" class="form-radio" name="radio" value="1" >
                            <span class="ml-2">Sì</span>
                        </label>
                        </div>
                        <div>
                        <label class="inline-flex items-center">
                            <input v-model="projection.tre_d" type="radio" class="form-radio" name="radio" value="0">
                            <span class="ml-2">No</span>
                        </label>
                        </div>
                    </div>
                </div>
                    <p class="mt-5 m-2">Scegli la sala:</p>
                <div class="w-full mt-4 border rounded-lg">
                    <select type="select" v-model="projection.room_id" class="w-full py-2.5 px-4 rounded-lg bg-gray-100 focus:shadow focus:bg-white focus:outline-none" required>
                        <option v-for="room in rooms" :key="room.id" :value="room.id">
                            {{room.name}}
                        </option>
                    </select>
                </div>
                    <p class="mt-5 m-2">Scegli il film:</p>
                <div class="w-full mt-4 border rounded-lg">
                    <select type="select" v-model="projection.movie_id" class="w-full py-2.5 px-4 rounded-lg bg-gray-100 focus:shadow focus:bg-white focus:outline-none" required>
                        <option v-for="movie in movies" :key="movie.id" :value="movie.id">
                            {{movie.title}}
                        </option>
                    </select>
                </div>
                <div class="w-full mt-4">
                    <button @click="createProjection()" class="w-full flex h-12 justify-center items-center font-normal hover:bg-purple-600 text-2xl text-white bg-purple-500 case rounded-lg">Crea
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                    <div v-if="created" class="mt-3">
                        <h1 class="text-green-400 text-xl font-light text-center">Proiezione creata con successo!</h1>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data() {
        return{
            rooms:{},
            movies:{},
            projection:{
                date:'',
                tre_d: 1,
                movie_id:'',
                room_id:'',
                },
            created: false
        }
    },
    async mounted() {
        try {
            let responseRoom = await axios.get("http://localhost:8000/api/rooms");
            let responseMovie = await axios.get("http://localhost:8000/api/movies");
            this.rooms = responseRoom.data;
            this.movies = responseMovie.data;
        } catch (err) {
            console.log(err);
        }
    },
    methods:{
        async createProjection(){
            console.log(this.projection.treD)
            console.log(this.projection)
            let request = await axios.post('http://localhost:8000/api/projection/create', this.projection);
            console.log(request.data)
            this.created = true;
        }
    }
}
</script>