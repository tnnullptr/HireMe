<template>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{job2.name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Job",
    props: ['jobs','admin'],
    mounted() {
        this.job2 = JSON.parse(this.jobs);
    },
    data(){
        return {
            'job2':{}
        }
    },
    methods:{
        accept(e){
            var that = this
            axios.post(that.acceptEndpoint, {
                'status': Number(e.currentTarget.dataset.status),
                'id': that.skill.id
            }).then((res) => {
                //console.table(res.data)
                console.log("Saved Update")
                alert(res.data.msg )
                location.reload()
            }).catch((error) => {
                console.error(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
