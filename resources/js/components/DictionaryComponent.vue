<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <form action="" @submit.prevent="saveData" id="reg">
                    <div class="row">
                        <div class="col-5 " >
                            <input type="text" class="form-control "  placeholder="Armenian" v-model="words.armenian"  @keydown="errors.armenian = null">
                            <span v-if="errors.armenian">
                                <span v-if="errors.armenian=='The armenian has already been taken.'">
                                    This armenian word has already been taken.
                                </span>
                                <span v-else>
                                    {{errors.armenian[0]}}
                                </span> 
                            </span>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control " placeholder="English" v-model="words.english" @keydown="errors.english = null">
                            <span v-if="errors.english">
                                <span v-if="errors.english=='The english has already been taken.'">
                                    This english word has already been taken.
                                </span>
                                <span v-else>
                                     {{errors.english[0]}}
                                </span>
                            </span>
                        </div>
                        <div class="col-2">
                            <input type="submit" class="form-control " value="Save">
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
        
            <div class="row modal" >
                <div class="col-12 modal-content" >     
                    <div class="w-100">
                        <span class="close" @click="close(index)" >&times;</span>
                    </div>
                    
                    <form action="" @submit.prevent="editData(index, word.id)" id="reg" class="my-3">
                        <div class="row">
                            <div class="col-5 ">
                                <input type="text" class="form-control " placeholder="Armenian"   v-model="word.armenian" @keydown="errors.armenian = null">
                                <span v-if="errors.armenian">
                                    <span v-if="errors.armenian=='The armenian has already been taken.'">
                                        This armenian word has already been taken.
                                    </span>
                                    <span v-else>
                                        {{errors.armenian[0]}}
                                    </span>
                                </span>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control " placeholder="English"   v-model="word.english" @keydown="errors.english = null">
                                <span v-if="errors.english">
                                    <span v-if="errors.english=='The english has already been taken.'">
                                        This english word has already been taken.
                                    </span>
                                    <span v-else>
                                        {{errors.english[0]}}
                                    </span>
                                </span>
                            </div>
                            <div class="col-2">
                                <input type="submit"  class="form-control " value="Save">
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
                errors: Object,
                
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

                     })
                    .catch(error => {
                        if (error.response.status == 422){
                            this.errors = error.response.data.errors
                        }
                        
                    })
                    
              
                   
            },
            show_edit_view(index, id){
                document.getElementsByClassName("modal")[index].style.display = "block";
                
            },
            close(index){
                document.getElementsByClassName("modal")[index].style.display = "none";

            },
            delate(index, id){
               
                this.$confirm("Do you want to delete this word?").then(() => {
                    
                    this.words.splice(index,1)

                    axios.delete('/dictionary/'+id)
                        .then(response => {
                        
                            console.log(response)
                        } );
                });     
            },
            editData(index,id){

                axios.put('/dictionary/'+id,{
                    armenian: this.words[index].armenian,
                    english: this.words[index].english
                    })
                     .then(response => {
                          this.close(index)
                     })
                     .catch(error => {
                        if (error.response.status == 422){
                            this.errors = error.response.data.errors
                        }
                    });

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
        border: 2px solid #b47775;
        border-radius: 0.25rem;
    }   

    .word {
            border: 2px solid #b47775;
            margin: 2vw 0.6vw 0 0.4vw;
            width: 90%;
            padding: 3% 0;
            text-align: center;
            border-radius: 0.25rem;
    }
    .col-1{
            margin-top: 2vw ;
            width: 90%;
            padding: 1% 0;
            text-align: center;
            cursor: pointer;
            color: #b47775;
    }
    .modal {
        position: fixed; 
        z-index: 1; 
        padding-top: 100px;
        margin: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
    }
    .modal-content {
        background-color:#f3f2f2 ;
        border:1px solid #b47775 ;
        margin: auto;
        padding: 2.5vw;
        width: 80%;
    }

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

    .swal2-styled.swal2-confirm{
        background-color: #b47775;
    }
    .swal2-styled:focus{
        box-shadow: none;
    }
    span{
        color: red;
    }


    @media only screen and (max-width: 500px) {
        .modal-content{
            width: 95%
        } 
        #reg input[type=submit]{
            font-size: 3vw;
        }
        
    } 

</style>
