import posts from './components/posts.vue'


require('./bootstrap');

window.Vue = require('vue');


Vue.component('posts', require('./components/posts.vue'));


let url = window.location.href;
let pageNumber = url.split('=')[1];

const app = new Vue({
		el: '#app',
		components: {
			posts
		},
    data(){
			return {
				blog:{}
			}
		},
    mounted(){
			axios.post('/getPosts',{
    		'page' : pageNumber
    	})
    	  .then(response => {
					this.blog = response.data.data
					// console.log(this.blog);
    	  	
    	  })
    	  .catch(function (error) {
    	    console.log(error);
    	  });
    }
});