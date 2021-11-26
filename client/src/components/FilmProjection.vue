<template>
  <div class="bg-gray-200 font-sans h-full">
    <div class="flex justify-start">
      <div class="sm:w-1/2 lg:w-1/3 py-6 px-3">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
          <div class="relative bg-cover bg-center h-96">
            <img :src="film.img" alt="" class="absolute inset-0 z-10 bg-cover bg-center h-full w-full"/>
          </div>
          <div class="p-4">
            <div class="flex inline-flex tracking-wide w-full">
              <!-- <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
                />
              </svg> -->
              <p class="mr-auto font-bold text-gray-900">Regia di: {{ film.director }}</p>
              <p>Valutazione: {{ film.rated }} stelle</p>
            </div>
            <p class="text-3xl text-gray-900 uppercase">{{ film.title }}</p>
          </div>
          <div class="flex p-4 border-t border-gray-300 text-gray-700 justify-items-stretch w-full">
            <div class="flex-1 inline-flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"
                />
              </svg>
              <p>
                <span class="text-gray-900 font-bold">Durata:
                {{ film.duration }} min </span>
              </p>
            </div>
            <div class="flex-1 inline-flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <p>
                <span class="text-gray-900 font-bold">Anno:
                {{ film.year }} </span>
              </p>
            </div>
          </div>
          <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
            <div
              class="text-xs uppercase font-bold text-gray-600 tracking-wide"
            >
              Descrizione
            </div>
            <div class="flex items-center pt-2">
              <div>
                <p class="text-gray-900">{{ film.description_long }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sm:w-1/2 lg:w-1/3 my-6 mx-3 py-6 px-3">
        <h2 class="text-light p-2">Seleziona la data:</h2>
        <!-- <div class="flex justify-between mb-3">
            <div class="ml-2">
                <label class="mr-2">Oggi</label>
                <input type="checkbox" v-model="projectionToday" @click="projectionToday=false">
            </div>
            <div class="mr-2" >
                <label class="mr-2">Domani</label>
                <input type="checkbox" v-model="projectionTomorrow" @click="projectionTomorrow=false" >
            </div>
        </div> -->
        <select v-model="selectDate" class="bg-white rounded">
          <option v-for="projection in projections" :key="projection.id" :value="projection.id">
            {{projection.date}}
          </option>
        </select>
        <button @click="cerca()" class="px-2 bg-purple-800 mx-2 text-white rounded">Cerca</button>
        <div v-for="row in room.rows" :key="row" class="grid mt-3" :style="'grid-template-columns: repeat(' + room.cols + ', minmax(0, 1fr))'">
            <div v-for="col in room.cols" :key="col">
                <!-- <div v-if="!isSeatOccupied(row, col)">
                  <img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/60/000000/external-chair-baby-vitaliy-gorbachev-fill-vitaly-gorbachev.png"/>
                </div> -->
                <div>
                  <button v-if="!isSeatTaken(row, col)" @click="select(row, col)"><img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-armchair-furniture-kiranshastry-lineal-kiranshastry.png"/></button>
                  <button v-else @click="unSelect(row, col)"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-armchair-furniture-kiranshastry-solid-kiranshastry.png"/></button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
//import _ from 'lodash';

export default {
  name: "FilmsView",
  data() {
    return {
      film: {},
      room: {},
      projections: {},
      projection: {},
      reservation: {},
      ticket: {},
      cols: [],
      rows: [],
      seatTaken: [],
      seatOccupied: [],
      selectDate: ""
    };
  },
  async mounted() {
    let movieId = this.$route.params.id;

    console.log(movieId);
    let response_movie = await axios.get(
      "http://localhost:8000/api/movie/" + movieId
    );

    let response_projections = await axios.get("http://localhost:8000/api/projections");
    
    this.film = response_movie.data;
    this.projections = response_projections.data;
  },
  methods: {
    async cerca() { 
      console.log(this.selectDate);
      let projectionDate = this.selectDate;
      let response_projection = await axios.get(
        "http://localhost:8000/api/projection/" + projectionDate
      );
      this.projection = response_projection.data;
      let projectionId = this.projection.id;
      console.log(this.projection.id);

      let roomId = this.projection.room_id;
      let response_room = await axios.get(
        "http://localhost:8000/api/room/" + roomId
      );
      this.room = response_room.data;
      this.cols = response_room.data.cols;
      this.rows = response_room.data.rows;
      console.log(this.room, this.cols, this.rows);

      let response_reservation = await axios.get(
        "http://localhost:8000/api/reservation/" + projectionId
      );
      this.reservation = response_reservation.data;
      console.log(this.reservation);
      
      let ticketId = this.reservation.id;
      let response_ticket = await axios.get(
        "http://localhost:8000/api/ticket/" + ticketId
      );
      this.ticket = response_ticket.data;
      console.log(this.ticket);
    },
    select(row, col) {
        this.seatTaken.push({
            row,
            col
        });
        console.log(this.seatTaken);
    },
    isSeatTaken(row, col) {
        let seatIsTaken = false;
        this.seatTaken.forEach(seat => {
            if (seat.row == row && seat.col == col) {
              seatIsTaken = true;
            }
        });
        return seatIsTaken;
    },
    // isSeatOccupied(row, col) {
    //     let seatIsOccupied = false;
    //     this.seatOccupied = this.ticket;
    //     this.seatOccupied.forEach(tickets => {
    //         if (tickets.row == row && tickets.col == col) {
    //           seatIsOccupied = true;
    //         }
    //     });
    //     return seatIsOccupied;
    // },
    unSelect(row, col){
        let selectedSeatIndex = this.seatTaken.findIndex((seat) => {
            if (seat.row == row && seat.col == col) {
                return true;
            }
        });
        this.seatTaken.splice(selectedSeatIndex, 1);
    }
  }
};
</script>
