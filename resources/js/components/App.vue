<template>
    <div>
        <div v-show="(msg != null)" class="alert alert-primary" role="alert">
            Добавлена новая статья: {{this.msg}}
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            msg: null,
        }
    },
    created() 
        {
        window.Echo.channel('Laravel-lab-blog')
            .listen('NewArticleEvent', (name) => {
                this.msg = name.name;  
            });
        
    }
}
</script>

<style scoped>

</style>