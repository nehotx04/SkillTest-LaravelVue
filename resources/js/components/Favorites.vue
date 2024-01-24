<template>
    <div class="container">
        <div>
            <ul class="list-group" v-for="data in responseData" :key="data.id">
                <ul class="list-group-item">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <p>Quote: <b>{{ data.quote }}</b></p>
                            <p>Author: <b> {{ data.author }} </b></p>
                        </div>
                        <div>
                            <button v-bind:id="data.id" @click="deleteFavorite(data.id)" class="btn btn-danger text-white">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    </div>
                </ul>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            responseData: null,
        };
    },
    mounted() {
        this.getFavorites()
    },
    methods: {
        getFavorites() {
            axios.get('/api/favorites')
                .then(response => {
                    this.responseData = response.data;
                    console.log(response.data)
                })
                .catch(error => {
                    console.error(error);
                });
        },

        deleteFavorite(id) {
            const data = this.responseData;
            const dataFind = data.find(data => data.id === id);
            console.log(dataFind.id)
            axios.delete('/api/favorite/delete/'+dataFind.id)
                .then(response => {
                    alert('Quote Deleted successfully');
                    this.getFavorites()
                    console.log(response)
                })
                .catch(error => {
                    console.log(error)
                });
        }

    }
}
</script>