<template>
    <div class="p-3 bg-indigo-900">
        <div class="flex flex-col">
            <div class="flex">
                <h1 class="font-bold text-5xl text-white font-mono m-5">In sala</h1>
            </div>
            <div v-if="!isLoading">
                <div v-for="film in films" :key="film.id">
                    <div class="overflow-auto flex-grow">
                        <div class="flex bg-gray-50 mx-10 rounded-2xl px-8 py-6 border-8 border-gray-300">
                            <div class="grid grid-cols-8">
                                <div class="flex flex-col ml-4">
                                    <div class="w-52 h-80 rounded-xl">
                                        <img :src="film.img" class="object-cover rounded-md w-auto h-full" />
                                    </div>
                                </div>
                                <div class="col-span-7 flex flex-col p-4 ml-20 justify-around">
                                    <div class="flex items-center border-b border-gray-200">
                                        <h2 class="text-3xl font-light"><span class="font-bold">Titolo: </span><span class="uppercase">{{ film.title }}</span></h2>
                                    </div>
                                    <div class="flex items-center border-b border-gray-200">
                                        <h2 class="text-l font-light"><span class="font-bold">Anno: </span>{{ film.year }}</h2>
                                    </div>
                                    <div class="flex items-center border-b border-gray-200">
                                        <h2 class="text-l font-light"><span class="font-bold">Durata: </span>{{ film.duration }} minuti</h2>
                                    </div>
                                    <div class="flex items-center border-b border-gray-200">
                                        <h2 class="text-l font-light"><span class="font-bold">Rega di: </span>{{ film.director }}</h2>
                                    </div>
                                    <div class="flex items-center border-b border-gray-200">
                                        <h2 class="text-l font-light"><span class="font-bold">Valutazione: </span>{{ film.rated }} / 5 ★</h2>
                                    </div>
                                    <div class="flex items-center border-b border-gray-200">
                                        <h2 class="text-l font-light"><span class="font-bold">Descrizione: </span>{{ film.description }}</h2>
                                    </div>
                                    <div class="flex flex-row float-right mt-5">
                                        <button @click="goToFilm(film)" class="inline-block bg-red-300 hover:bg-red-400 text-white font-bold py-6 px-8 rounded-xl uppercase transition duration-200">Acquista</button>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <hr class="border-3 border-white mt-7 mb-7">
                    </div>
                </div>
            </div>
            <div v-else class="flex items-center justify-center p-10">
                <span class="text-gray-400 font-bold text-center text-xl flex flex-col items-center">
                    <Spinner class="w-8 h-8"></Spinner>
                    Caricamento...
                </span>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Spinner from './Spinner.vue'

export default {
    components: {
        Spinner
    },
    data() {
        return {
            films: [],
            isLoading: true
        }
    },
    async mounted() {
        this.isLoading = true;
        try {
            let response = await axios.get("http://localhost:8000/api/movies");
            this.films = response.data;
        } catch (err) {
            console.log(err);
        }
        this.isLoading = false;
    },
    methods: {
        goToFilm(film) {
            console.log(film);

            this.$router.push("/projection/"+ film.id)
        }
    }

}
</script>