<template>
    <div class="post-preview">
        <a :href="slug">
            <h2 class="post-title">
                {{ title }}
            </h2>
            <h3 class="post-subtitle">
                {{ subtitle }}
            </h3>
        </a>
        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> {{ created_at }} 
            <a href="" @click.prevent="likeIt" id="count">
                <small>{{ likeCount }}</small>
                <i class="fa fa-heart" style="color:rgb(255, 150, 150);font-size: 15px;" v-if="likeCount > 0 && likeCount <= 10" aria-hidden="true"></i>
                <i class="fa fa-heart" style="color:rgb(255, 75, 75);font-size: 20px;" v-else-if="likeCount > 10 && likeCount <= 50" aria-hidden="true"></i>
                <i class="fa fa-heart" style="color:rgb(255, 0, 0);font-size: 25px;" v-else-if="likeCount > 50 " aria-hidden="true"></i>
            </a>
        </p>
        <hr>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                likeCount: ''
            }
        },
        props:[
            'title','subtitle','created_at','postId','login','likes','slug'
        ],
        created(){
            this.likeCount = this.likes
        },
        methods:{
            likeIt(){
                if (this.login) {
                    axios.post('/saveLike',{
                        id : this.postId
                    })
                      .then(response => {
                        if (response.data == 'deleted') {
                            this.likeCount -= 1;
                        }else{
                            this.likeCount += 1;
                        }
                        // this.blog = response.data.data
                        // console.log(response);
                      })
                      .catch(function (error) {
                        console.log(error);
                      });
                }else{
                    window.location = 'login'
                }
            }
        }
    }
</script>