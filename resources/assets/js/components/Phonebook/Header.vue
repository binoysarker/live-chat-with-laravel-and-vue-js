<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                Phonebook
            </a>
            <div class="navbar-menu ">
                <a class="navbar-item" href="/home">
                    <router-link to="/home">Home</router-link>
                </a>
                <a class="navbar-item" href="/about">
                    <router-link to="/about">About</router-link>
                </a>
            </div>

            <button class="button navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
</template>
<script >

</script>
<style>

</style>