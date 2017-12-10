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
    </div>
</template>

<script>
    import ElementUI from 'element-ui'
    import 'element-ui/lib/theme-chalk/index.css'

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
        }
    }
</script>
