<template>
    <div>
        <li class="list-group-item" >
            <a :href="covid" >{{id}} 證明文件</a>
        </li>
        <div >
            <div class="form-group">
                <div class="btn-group w-100" role="group">
                    <button type="button" data-status="1" @click="accept($event)" class="btn btn-success">
                        <i class="fa fa-check-circle "
                           data-toggle="tooltip" data-placement="top"
                           title="Verified COVID19 Influenced Person"
                        ></i>
                    </button>
                    <button type="button" data-status="0" @click="accept($event)" class="btn btn-danger">
                        <i class="fa fa-times-circle "
                           data-toggle="tooltip" data-placement="top"
                           title="Rejected COVID19 Influenced Person"
                        ></i>
                    </button>
                </div>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
export default {
    name: "Covid19",
    props: ['covid','id','accept-endpoint'],
    mounted() {

    },
    data(){
        return {

        }
    },
    methods:{
        accept(e){
            var that = this
            axios.post(that.acceptEndpoint, {
                'status': Number(e.currentTarget.dataset.status),
                'id': that.id
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
