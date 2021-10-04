<template>
  <card-view
    :count="count"
  ></card-view>
</template>

<script>
export default {
    props: ['post_id', 'count_view'],
    data(){
        return{
            count: this.count_view
        }
    },
    methods: {
        sendViewArticle(){
            axios.post('/article_view', {
                id: Number(this.post_id)
            }).then((responce) => {

                if(responce.data.new_count_view){
                    this.count = responce.data.new_count_view
                }

            });
        }
    },
    mounted(){
        setTimeout(() => {
            this.sendViewArticle();
        }, 5000)
    }
}
</script>

<style scoped>

</style>
