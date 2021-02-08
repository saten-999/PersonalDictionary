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
        <div v-for="(word, index) in words" :key="index">
            <div class="row mt-5">
                <div class="col-sm-12 ">
                    <div  class="row " >
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
                        
                            <font-awesome-icon icon="pen" @click="show_edit_view(index, word.id)" />
                        </div>
                        <div class="col-1">
                            
                            <font-awesome-icon icon="trash-alt" @click="delate(index, word.id)" />

                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row modal"  >
                <div class="col-12 modal-content" >     
                    <div class="w-100">
                        <span class="close" @click="close(index)" >&times;</span>
                    </div>
                    
                    <form action="" @submit.prevent="editData(index, word.id)" id="reg" class="my-3">
                        <div class="row">
                            <div class="col-5 ">
                                <input type="text" placeholder="Հայերեն"   v-model="word.armenian">
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="English"   v-model="word.english">
                            </div>
                            <div class="col-2">
                                <input type="submit" value="Save">
                            </div>
                        </div>
                    </form>
                
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
                       english: String,
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

            show_edit_view(index, id){
                document.getElementsByClassName("modal")[index].style.display = "block";
                
            },
            close(index){
                document.getElementsByClassName("modal")[index].style.display = "none";

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

            editData(index,id){

                axios.put('/dictionary/'+id,{
                    armenian: this.words[index].armenian,
                    english: this.words[index].english
            })
                     .then(response => {
                         console.log(response.data)
                         this.close(index)
                        //  this.words.unshift(response.data);
                        // this.words.armenian = '';
                        // this.words.english = '';

                     } );
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


    .modal {
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    }

    /* The Close Button */
    .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    }

    .close:hover,
    .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    }

</style>
