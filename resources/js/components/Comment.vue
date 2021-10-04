<template>
    <div id="comment">

        <h3 class="mb-3">Комментарии</h3>
        <div id="comment_list" class="mb-5">
            <div v-for="comment in itemComment" class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{comment.subject}}</div>
                    {{comment.body}}
                </div>
            </div>
        </div>

        <div v-if="!sended">

            <h3 class="mb-3">Форма добавление комментария:</h3>

            <div class="form-floating mb-3">
                <input v-model="model.subject" type="text" class="form-control" :class="{'is-invalid': valid.subject}" id="floatingInputGrid" placeholder="Введите тему комментария" value="">
                <label for="floatingInputGrid">Тема комментария</label>
                <div class="invalid-feedback">
                    {{valid.subject}}
                </div>
            </div>
            <div class="form-floating mb-3">
                <textarea v-model="model.body" class="form-control" :class="{'is-invalid': valid.body}" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Текст комментария</label>
                <div class="invalid-feedback">
                    {{valid.body}}
                </div>
            </div>
            <div class="mb-3 form-check">
                <input v-model="model.agree"  type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Согласен с <a href="#">правилами сообщества</a></label>
            </div>
            <button @click.prevent="sendComment" type="submit" class="btn btn-primary btn-lg" :disabled="!model.agree">
            <span v-show="send">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Отправка...
            </span>
                <span v-show="!send">Отправить</span>

            </button>
        </div>
        <div v-else>
            <h3>Ваш комментарий успешно отправлен и создан</h3>
        </div>



    </div>
</template>

<script>
export default {
    props: ['post_id', 'list'],
    data(){
        return{
            comments: JSON.parse(this.list),
            model: {
                subject: '',
                body: '',
                agree: true
            },
            valid: {
                subject: false,
                body: false,
            },
            send: false,
            sended: false
        }
    },
    methods:{
        sendComment(){

            this.send = true;
            this.valid.subject = false;
            this.valid.body = false;

            setTimeout(() => {

                axios.post('/comment', {
                    post_id: Number(this.post_id),
                    subject: this.model.subject,
                    body: this.model.body
                }).then((response)=> {

                    console.log(response.data);
                    console.log(response.data.success);

                    if(response.data.error && response.data.error.subject !== 'undefined'){
                        this.valid.subject = response.data.error.subject[0];
                    }

                    if(response.data.error && response.data.error.body !== 'undefined'){
                        this.valid.body = response.data.error.body[0];
                    }

                    if(response.data.success){

                        this.comments.push({
                            subject: response.data.comment.subject,
                            body: response.data.comment.body,
                        });

                        this.model.subject = '';
                        this.model.body = '';
                        this.model.agree = false;

                        this.sended = true;

                    }

                    this.send = false;

                });
            }, 4000);


        }
    },
    computed: {
        itemComment(){
            return this.comments;
        }
    },
    mounted() {
        console.log('list', JSON.parse(this.list));
    }
}
</script>

<style scoped>

</style>
