<template>
    <div>
        <div class="flex w-full bg-gray-800 p-6 justify-around items-center">
            <div class="flex">
                <h1 class="text-5xl font-light text-white">UCI Cinema </h1>
                <p class="text-xl font-light text-white">©</p>
            </div>
            <div class="flex flex-col font-light text-white">
                <a :href="pathForHome" class="bg-purple-800 text-white px-3 py-2 rounded-md transform hover:scale-105 transition duration-500">Home</a>
            </div>
            <div class="flex flex-col">
                <div class="flex items-center">
                    <input type="text" placeholder="Search" class="bg-gray-100 outline-none rounded-xl h-8 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 -ml-7 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <div class="flex font-light text-white">
                <a @click="goToCreateFilm()" class="bg-green-400 text-white px-3 py-2 rounded-md transform hover:scale-105 transition duration-500">New Film</a>
            </div>
            <div class="flex flex-col font-light text-white">
                <a @click="goToCreateProjection()" class="bg-green-400 text-white px-3 py-2 rounded-md transform hover:scale-105 transition duration-500">New Projection</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pathForHome:"/home",
            pathForMyTickets: "my_ticket",
            pathForCreateFilm: "create_film",
            pathForCreateProjection: "create_projections"
        }
    },
    methods: {
        goToTicket() {
            this.$router.push({
                name: this.pathForMyTickets
            })
        },
        goToCreateFilm(){
            this.$router.push({
                name: this.pathForCreateFilm
            })
        },
        goToCreateProjection(){
            this.$router.push({
                name: this.pathForCreateProjection
            })
        }
    }, 
}
</script>