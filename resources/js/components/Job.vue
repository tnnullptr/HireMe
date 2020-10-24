<template>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{job2.name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-money"></i>: {{job2.salary}}</h6>
            <p class="card-text"><i class="fa fa-location-arrow"></i>: {{job2.location}} </p>
            <p class="card-text"><i class="fa fa-bookmark"></i>: {{job2.type}} </p>


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
        /*accept(e){
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
        }*/
    }
}
</script>

<style scoped>

</style>
