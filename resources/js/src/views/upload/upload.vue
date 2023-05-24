<template>
    <div class="container">
        <form @submit.prevent="submit">
            <input type="file" @change="onChange">
            <input type="submit" value="Upload">
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data:()=>({
        image:null,
    }),
    methods:{
        onChange(e){
            console.log("selected file", e.target.files[0])
            this.image = e.target.files[0]
        },
        submit(){
            let fd = new FormData();
            fd.append('img',this.image)
            axios.post("/api/upload", fd).then(res=>{
                console.log("Response", res.data)
            }).catch(err=>console.log(err))
        }
    }
}
</script>