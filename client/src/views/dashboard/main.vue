<template>
	<div>
        <the-sidebar></the-sidebar>
            <h2>dashboard.main</h2>
            <router-view></router-view>
        <the-footer></the-footer>
	</div>
</template>

<script setup>
import TheSidebar from "../../components/dashboard/TheSidebar.vue";
import TheFooter from "../../components/dashboard/TheFooter.vue";
</script>

<style></style>
