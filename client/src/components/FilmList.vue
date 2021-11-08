<template>
    <div class="p-3">
        <div class="flex flex-col">
            <div class="flex">
                <h1 class="font-bold text-5xl font-mono m-5">In sala</h1>
            </div>
            <div v-for="film in films" :key="film.id">
                <div class="overflow-auto flex-grow">
                    <div class="bg-gray-50 mx-10 rounded-xl shadow-lg px-8 py-6 flex items-center border-b border-gray-300">
                        <div class="flex ml-4">
                            <div class="bg-black w-52 h-80 rounded-xl">
                                <img :src="film.img" class="object-cover rounded object-top w-auto h-full" />
                            </div>
                            <div class="flex flex-col pl-4 ml-10">
                                <h2 class="font-medium text-sm">{{ film.title }}</h2>
                                <h3 class="text-gray-500 text-sm">{{ film.regista }}</h3>
                            </div>
                        </div>
                    </div>
                    <hr class="border-3 border-black mt-7">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            films: [
                {
                    id: 1,
                    img: "https://pad.mymovies.it/filmclub/2002/08/232/locandina.jpg",
                    title: "Titolo",
                    regista: "Regista",
                    cast: "",
                    durata: "",

                }
            ]
        }
    },
    async mounted() {
        this.isLoading = true;
        console.log("Prima di promise - 1");

        try {
            let response = await axios.get("http://127.0.0.1:8000/api/movies");
            this.films = response.data;
        } catch (err) {
            console.log(err);
        }
        this.isLoading = false;
    },

}
</script>