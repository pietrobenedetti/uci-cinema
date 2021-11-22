<template>
    <div>
        <nav class="bg-gray-800 p-6">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                        Icon when menu is closed.

                        Heroicon name: outline/menu

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                        Icon when menu is open.

                        Heroicon name: outline/x

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <h1 class="text-5xl font-light text-white">uci cinema </h1><p class="text-xl font-light text-white">©</p>
                    </div>
                    <div class="flex flex-grow ml-12">
                        <a :href="pathForHome" class="bg-purple-800 text-white px-3 py-2 rounded-md font-medium my-auto transform hover:scale-105 transition duration-500 flex-2" aria-current="page">Home</a>
                        <div class="ml-8 flex p-2 bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-500 align-center justify-between w-96">
                            <div class="flex bg-gray-100 rounded-lg p- m-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                <input class="bg-gray-100 outline-none rounded-xl w-56" type="text" placeholder="Film, Actor..." />
                            </div>
                            <div class="bg-indigo-600 py-2 px-3 text-white font-semibold rounded-lg hover:shadow-lg transition duration-3000 cursor-pointer h-12">
                                <div class="my-auto">
                                    <span>Search</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="bg-purple-800 py-2 px-3 rounded-md text-white hover:scale-105 transform transition duration-500" @click="goToTicket()">
                        <span>My Tickets</span>
                    </button>
                    <button type="button" class="bg-green-400 py-2 px-3 rounded-md text-white hover:bg-green-600 duration-500 ml-3" @click="goToCreateFilm()">
                        <span>create +</span>
                    </button>

                </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pathForHome:"/home",
            pathForMyTickets: "my_ticket",
            pathForCreateFilm: "create_film"
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
        }
    }, 
}
</script>