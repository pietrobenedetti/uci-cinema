<template>
  <div class="bg-gray-200 font-sans">
    <div class="flex items-center justify-start">
      <div class="sm:w-1/2 lg:w-1/3 py-6 px-3">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
          <div class="relative bg-cover bg-center h-96 p-4">
            <img
              :src="film.img"
              alt=""
              class="absolute inset-0 z-10 bg-cover bg-center h-full w-full"
            />
            <div class="flex justify-end">
              <svg
                class="h-6 w-6 text-white fill-current"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
              >
                <path
                  d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"
                ></path>
              </svg>
            </div>
          </div>
          <div class="p-4">
            <div class="flex inline-flex uppercase tracking-wide">
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
                  d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
                />
              </svg>
              <p class="ml-3 font-bold text-gray-900">{{ film.title }}</p>
            </div>
            <p class="text-3xl text-gray-900">{{ film.genere }}</p>
          </div>
          <div class="flex p-4 border-t border-gray-300 text-gray-700">
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
                <span class="text-gray-900 font-bold">Stagioni:</span>
                {{ film.cast }}
              </p>
            </div>
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
                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                />
              </svg>
              <p>
                <span class="text-gray-900 font-bold">Episodi:</span>
                {{ film.durata }}
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
                <p class="font-bold text-gray-900">{{ film.title }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sm:w-1/2 lg:w-1/5 bg-white">
        <div class="flex justify-between mb-3">
            <div class="ml-2">
                <label class="mr-2">Oggi</label>
                <input type="checkbox" v-model="projectionToday" @click="projectionToday=false">
            </div>
            <div class="mr-2" >
                <label class="mr-2">Domani</label>
                <input type="checkbox" v-model="projectionTomorrow" @click="projectionTomorrow=false" >
            </div>
        </div>
        <select v-model="selectDate">
          <option 
            v-for="projection in filterProjection" 
            :key="projection.id"
            :value="projection.date"
          >
            {{projection.date}}
          </option>
        </select>
        <button @click="cerca()">Cerca</button>
        <div
          v-for="row in room.rows"
          :key="row"
          class="grid"
          :style="'grid-template-columns: repeat(' + room.cols + ', minmax(0, 1fr))'"
        >
            <div v-for="col in room.cols" :key="col">
                <div v-if="!isSeatOccupied(row, col)">
                  <img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/60/000000/external-chair-baby-vitaliy-gorbachev-fill-vitaly-gorbachev.png"/>
                </div>
                <div v-else>
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
import _ from 'lodash';

export default {
  name: "FilmsView",
  data() {
    return {
      film: {},
      room: {},
      projections: {},
      projection: [],
      projectionToday: false,
      projectionTomorrow: false,
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

    let response_projection = await axios.get("http://localhost:8000/api/projections");
    
    this.film = response_movie.data;
    this.projections = response_projection.data;
  },
  methods: {
    async cerca() { //DA FARE PORCODIO
      console.log(this.selectDate);
      let projectionDate = this.selectDate;
      let response_projection = await axios.get(
        "http://localhost:8000/api/projection/" + projectionDate
      );
      this.projection = response_projection.data;
      let projectionId = this.projection.id;
      console.log(this.projection.id);

      let response_room = await axios.get(
        "http://localhost:8000/api/room/" + projectionId
      );

      let response_reservation = await axios.get(
        "http://localhost:8000/api/reservation/" + projectionId
      );

      let response_ticket = await axios.get(
        "http://localhost:8000/api/ticket/" + projectionId
      );

      this.room = response_room.data;
      this.cols = response_room.data.cols;
      this.rows = response_room.data.rows;
      this.reservation = response_reservation.data;
      this.ticket = response_ticket.data;
      console.log(this.room);
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
    isSeatOccupied(row, col) {
        let seatIsOccupied = false;
        this.seatOccupied = this.tickets;
        this.seatOccupied.forEach(tickets => {
            if (tickets.row == row && tickets.col == col) {
              seatIsOccupied = true;
            }
        });
        return seatIsOccupied;
    },
    unSelect(row, col){
        let selectedSeatIndex = this.seatTaken.findIndex((seat) => {
            if (seat.row == row && seat.col == col) {
                return true;
            }
        });
        this.seatTaken.splice(selectedSeatIndex, 1);
    }
  },
  computed: {
    filterProjection() {
            if (this.projectionToday == true) {
                return _.orderBy(this.projections, "date", "asc");
            }
            if (this.projectionTomorrow == true) {
                return _.orderBy(this.projections, "date", "desc");
            }
            return this.projections;
        }
  }
};
</script>
