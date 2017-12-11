<template>

    <div class="container">
        <el-menu
                :default-active="activeIndex"
                class="el-menu-demo"
                mode="horizontal"
                @select="handleSelect"
                background-color="#545c64"
                text-color="#fff"
                active-text-color="#ffd04b">
            <el-menu-item index="1">Main Menu</el-menu-item>
            <el-menu-item index="2">Control</el-menu-item>
        </el-menu>
        <div id="chart"></div>
    </div>
</template>

<script>
    import ElementUI from 'element-ui'
    import 'element-ui/lib/theme-chalk/index.css'
    import axios from 'axios';

    export default {
        data() {
            return {
                activeIndex: '1'
            };
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        },
        mounted() {
            console.log('Component mounted.')
            var chart = c3.generate({
                bindto: '#chart',
                data: {
                    columns: [
                        ['data1', 30, 200, 100, 400, 150, 250],
                        ['data2', 50, 20, 10, 40, 15, 25]
                    ]
                }
            });
            setInterval(()=>{
                axios.get(`/api/sensor`)
                    .then(response => {
                        let columns = []
                        let data = response.data
                        data[0].sensorData.forEach((volume,column)=>{
                            columns.push([column])
                        })
                        data.forEach((sensorData)=>{
                            var i = 0
                            sensorData.forEach((volume,column)=>{
                                columns[i].push(volume)
                                i += 1
                            })
                        })
                        chart.load({
                            columns: columns
                        });
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
                console.log("Success!!")
            },1000)
        }
    }


</script>
