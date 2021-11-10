<template>
        <div class="bg-gray-200 font-sans">

                <div class="flex items-center justify-start">
                    <div class="sm:w-1/2 lg:w-1/3 py-6 px-3">
                        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                            <div class="relative bg-cover bg-center h-96 p-4">
                            <img :src="film.img" alt="" class=" absolute inset-0 z-10 bg-cover bg-center h-full w-full" />
                                <div class="flex justify-end">
                                    <svg class="h-6 w-6 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class= "flex inline-flex uppercase tracking-wide">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>     <p class="ml-3 font-bold text-gray-900">{{film.title}}</p>
                            </div>
                                <p class="text-3xl text-gray-900">{{film.genere}}</p>
                            </div>
                            <div class="flex p-4 border-t border-gray-300 text-gray-700">
                                <div class="flex-1 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                                    </svg>
                                    <p><span class="text-gray-900 font-bold">Stagioni:</span> {{film.cast}}</p>
                                </div>
                                <div class="flex-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    <p><span class="text-gray-900 font-bold">Episodi:</span> {{film.durata}}</p>
                                </div>
                            </div>
                            <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                                <div class="text-xs uppercase font-bold text-gray-600 tracking-wide">Descrizione</div>
                                <div class="flex items-center pt-2">
                                    <div>
                                        <p class="font-bold text-gray-900">{{film.description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sm:w-1/2 lg:w-2/3 bg-red-900 flex-grow">
                        <div v-for="row in room.rows" :key="row" class="grid" :style="'grid-template-columns: repeat(' + room.cols + ', minmax(0, 1fr))'">
                            <div v-for="col in room.cols" :key="col">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</template>

<script>
import axios from "axios";

export default {
  name: "FilmsView",
  data() {
    return {
      film: {},
      room: {},
      cols: [],
      rows: []
    };
  },
  async mounted() {
    let filmId = this.$route.params.id;
    console.log(filmId);

    let response = await axios.get("http://localhost:8000/movie/" + filmId);
    let response_room = await axios.get("http://localhost:3000/room/");
    //let response_exist_ticket = await axios.get("http://localhost:8000/tickets")

    this.film = response.data;
    this.room = response_room.data;
    this.cols = response_room.data.cols;
    this.rows = response_room.data.rows;
  },
  methods: {
    edit(film) {
      this.$router.push({
              name: "films_edit",
              params: {
                id: film.id
              }
            })
    },
    del() {
      if(confirm("Vuoi cancellare davvero questo bel film?")){
      let filmId = this.$route.params.id;
      axios.delete("http://localhost:3000/movies/" + filmId),
      this.$router.push({
                name: "films_list"
            })
      }
    }
  }
};
</script>