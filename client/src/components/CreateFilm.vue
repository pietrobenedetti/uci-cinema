<template>
    <div>
    <div class="w-screen h-screen flex bg-indigo-900 justify-item-center">
        <div class="w-1/3 m-w-450 m-auto mt-20 h-auto rounded-lg bg-white py-8 px-7">
            <h1 class="text-4xl font-bold text-gray-600 text-center">Create a new Film</h1>
            <hr class="border-3 border-black mt-5 mb-5">
            <div class="w-full mt-6">
            <div class="w-full border rounded-lg">
                <input type="text" class="w-full py-2.5 px-4 rounded-lg bg-gray-100 focus:shadow focus:bg-white focus:outline-none" id="titolo" placeholder="titolo"/>
            </div>
            <div class="w-full mt-4 mb-4 border rounded-lg">
                <input type="text" class="w-full py-2.5 px-4 rounded-lg bg-gray-100 focus:shadow focus:bg-white focus:outline-none" id="year"  placeholder="anno"/>
            </div>
            <div class="w-full mt-4 border rounded-lg">
                <input type="text" class="w-full py-2.5 px-4 rounded-lg bg-gray-100 focus:shadow focus:bg-white focus:outline-none" id="durations" placeholder="durata"/>
            </div>
            <div class="w-full mt-4 border rounded-lg">
                <input type="text" class="w-full py-2.5 px-4 rounded-lg bg-gray-100 focus:shadow focus:bg-white focus:outline-none" placeholder="registra"/>
            </div>
            <div class="w-full mt-4 border rounded-lg">
                <select type="select" class="w-full py-2.5 px-4 rounded-lg bg-gray-100 focus:shadow focus:bg-white focus:outline-none">
                    <option v-for="room in rooms" :key="room.id" :value="room.name">
                        {{room.name}}
                    </option>
                </select>

            </div>
            <div class="w-full mt-4">
                <button id="signup" class="w-full flex h-12 justify-center items-center font-normal hover:bg-purple-600 text-2xl text-white bg-purple-500 case rounded-lg">Crea
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
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
            rooms:{
            },
        }
    },
    async mounted() {
        try {
            let response = await axios.get("http://localhost:8000/api/rooms");
            this.rooms = response.data;
        } catch (err) {
            console.log(err);
        }
    },
}
</script>