<template>
	<div>
		<h2>HOME</h2>
		<a href="#" @click.prevent="logout">Logout</a>
	</div>
</template>

<script>
export default {
	data() {
		return {
			
		};
	},
	methods: {
		logout() {
			Store.dispatch("logout")
				.then((response) => {
					this.$router.push("/login");
				})
				.catch((error) => {
					let errorMessage = error.response.data.message;
					alert(errorMessage);
				});
		},
	},
};
</script>

<style></style>
