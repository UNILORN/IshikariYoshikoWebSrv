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
        <div id="chart2"></div>
        <div id="chart3"></div>
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

            var chart2 = c3.generate({
                bindto: '#chart2',
                data: {
                    columns: [
                    ],
                    type: 'gauge',
                    onclick: function (d, i) { console.log("onclick", d, i); },
                    onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                },
                color: {
                    pattern: ['#FF0000', '#F97600', '#F6C600', '#60B044'], // the three color levels for the percentage values.
                    threshold: {
                        values: [30, 60, 90, 100]
                    }
                },
                size: {
                    height: 180
                }
            });

            var chart3 = c3.generate({
                bindto: '#chart3',
                data: {
                    columns: [
                    ],
                    type: 'gauge',
                    onclick: function (d, i) { console.log("onclick", d, i); },
                    onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                },
                color: {
                    pattern: ['#60B0FF'], // the three color levels for the percentage values.
                },
                size: {
                    height: 180
                }
            });

            var chart = c3.generate({
                bindto: '#chart',
                data: {
                    columns: [],
                    type: 'spline'
                }
            });
            setInterval(()=>{
                axios.get(`/api/sensor`)
                    .then(response => {
                        let columns = []
                        let data = response.data
                        Object.keys(data[0]).forEach((column)=>{
                            columns.push([column])
                        })
                        console.log(data[0]["temperature"])
                        chart2.load({
                            columns: ["data",data[0]["temperature"]]
                        });
                        chart3.load({
                            columns: ["data",data[0]["humidity"]]
                        });
                        data.forEach((sensorData)=>{
                            var i = 0
                            Object.keys(sensorData).forEach((column)=>{
                                columns[i].push(sensorData[column])
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
