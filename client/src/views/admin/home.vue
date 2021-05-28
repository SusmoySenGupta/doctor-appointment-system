<template>
	<div class="container px-6 mx-auto grid">
		<h2
			class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
		>
			Dashboard
		</h2>
		<Card></Card>
		<Table :table-headers="tableHeaders"></Table>
	</div>
</template>

<script>
import Card from "../../components/Card.vue";
import Table from "../../components/Table.vue";

export default {
	components: {
		Card,
		Table,
	},
	data() {
		return {
			tableHeaders: ["User", "Amount", "Status", "Date"],
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

	computed: {
		user() {
			return Store.getters.getCurrentUser;
		},
	},
};
</script>

<style></style>
