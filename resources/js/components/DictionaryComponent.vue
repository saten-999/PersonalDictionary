<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <form action="" @submit.prevent="saveData" id="reg">
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
                <div  class="row " v-for="(word, index) in words" :key="index">
                   <div class="col-5">
                        <div class="word">
                            {{ word.armenian}}
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="word">
                            {{ word.english}}
                        </div>
                    </div>
                    <div class="col-1"> 
                     
                         <font-awesome-icon icon="pen" @click="edit(index, word.id)" />
                    </div>
                    <div class="col-1">
                        
                        <font-awesome-icon icon="trash-alt" @click="delate(index, word.id)" />

                     </div>
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
                ],
                
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
            },

            edit(index, id){
                console.log(index)
              
                // this.words[index]['armenian'] =  
            },

            delate(index, id){
                var del= confirm("Do you want to delete this word")

                if (del == true) {
                     this.words.splice(index,1)

                    axios.delete('/dictionary/'+id)
                        .then(response => {
                        
                            console.log(response)
                        } );
                }                         
            
            },

        },
        mounted() {
             axios.get('/dictionary')
                  .then(response => ( this.words = response.data ));

                
        }
    }
</script>



<style lang="css">
  #reg input{
    width: 100%;
    padding: 2%;
    height: 100%;
  }

  .word {
        border: 1px solid gray;
        margin: 2vw 0.6vw 0 0.4vw;
        width: 90%;
        padding: 3% 0;
        text-align: center;
  }
  .col-1{
        margin-top: 2vw ;
        width: 90%;
        padding: 1% 0;
        text-align: center;
        cursor: pointer;
  }

</style>
