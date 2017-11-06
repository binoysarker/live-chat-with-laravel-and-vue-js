<template>
    <div>
        <li :class="className">
            <slot></slot>
            <span class="badge badge-warning" id="time">{{time}}</span>
        </li>
        <div class="badge badge-info d-lg-block float-right">{{user}}</div>
        <div class="badge badge-info d-lg-block float-left">{{typing}}</div>

    </div>
</template>

<script>
    export default {
        props:[
            'color',
            'user',
            'typing',
            'time'
        ],
        computed:{
            className(){
                return 'list-group-item-'+this.color; 
            },
        },
    }
</script>
<style>
    #time{
        font-size:8px;
    }
</style>