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
                <button v-bind:id="data.id + ' liveToastBtn'" @click="addFavorite(data.id)" class="btn btn-warning text-white">
                  <i class="fa-solid fa-star"></i>
                </button>
            </div>
          </div>
        </ul>
      </ul>
      
      <div>
        <button @click="getNewQuotes" class="btn btn-primary text-white mt-2">
          <i class="fa-solid fa-rotate-right"></i>
        </button>
        
        <a href="/quotes/favorites" class="btn btn-secondary text-white mt-2 mx-2">Favorites quotes</a>
      </div>

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
    this.getNewQuotes();
  },

  methods:{
    getNewQuotes(){
    axios.get('/api/quotes/random')
    .then(response => {
        this.responseData = response.data;
      })
      .catch(error => {
        console.error(error);
      });
    },

    addFavorite(id) {
      const data = this.responseData;
      const dataFind = data.find(data => data.id === id);

      console.log(dataFind);
      axios.post('/api/quotes/addFavorite', dataFind)
        .then(response => {
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        });
    },

  }

};
</script>