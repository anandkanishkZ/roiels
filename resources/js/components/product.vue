<template>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Qty</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <tr v-for="(blog, index) in blogs" :key="blog.id">
                <td>{{blog.title}}</td>
                <td>{{blog.rank}}</td>
                <td><img :src="image_src + blog.image"></td>
                <td><button @click="editImage(blog.id)">Delete</button> </td>
            </tr>
        </table>
        </div>
    </div>
</div>
</template>
<script>
export default{
    data(){
        return{
        blogs: [],
            image_src: 'public/images/blog/',
        }
    },
    methods: {
        editImage(id){
            this.blogs.splice(this.blogs.indexOf(id), 1)
        }
    },
    created(){
        axios.get('/blog/')
        .then(response => this.blogs = response.data)
        .catch(error => console.log('error') )
    }

}
</script>
<style scoped>

</style>
