<template>
	<div class="border">
		<h2>Home Page->Doctor</h2>
		<a
			class="text-sm text-white px-3 py-1 bg-red-400 rounded"
			href="#"
			@click.prevent="logout"
			>Logout</a
		>
	</div>
</template>

<script>
export default {
	data() {
		return {};
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
