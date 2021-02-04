<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <form action="" @submit.prevent="saveData">
                    <div class="row">
                        <div class="col-5 ">
                            <input type="text" placeholder="Հայերեն" v-model="words.armenian">
                        </div>
                        <div class="col-5">
                            <input type="text" placeholder="English" v-model="words.english">
                        </div>
                        <div class="col-2">
                            <input type="submit" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 ">
                <div  class="row " v-for="word in words" :key="word.index">
                   <div class="col-sm-5">
                        {{ word.armenian}}
                    </div>
                    <div class="col-sm-5">
                        {{ word.english}}
                    </div>
                    <div class="col-sm-2"> </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                words:[
                   {
                       armenian: String,
                       english: String

                   } 
                ]
            }
        },
        methods: {
            saveData(){
                axios.post('/dictionary',{
                    armenian: this.words.armenian,
                    english: this.words.english
            })
                     .then(response => {
                         this.words.unshift(response.data);
                        this.words.armenian = '';
                        this.words.english = '';

                     } );
            }
        },
        mounted() {
             axios.get('/dictionary')
                  .then(response => ( this.words = response.data ));

                  console.log(this.words)
        }
    }
</script>



<style lang="css">
  input{
    width: 100%;
    padding: 2%;
    height: 100%;
  }

  .col-sm-5 {
        border: 1px solid gray;
    margin: 2vw 0.6vw 0 0.4vw;
    width: 90%;
    padding: 1% 0;
    text-align: center;
  }

</style>
