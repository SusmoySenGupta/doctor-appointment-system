<template>
	<form @submit.prevent="login(user)">
		<div>
			<label for="email"> Email </label>
			<input v-model="user.email" type="email" placeholder="Email" />
		</div>
		<div>
			<label for="password"> Password </label>
			<input
				v-model="user.password"
				type="password"
				placeholder="Password"
			/>
		</div>
		<div>
			<button type="submit">Sign In</button>
		</div>
	</form>
</template>

<script>
export default {
	name: "login-component",
	data() {
		return {
			user: {
				email: "admin@admin.com",
				password: "secret",
			},
		};
	},
	methods: {
		login(user) {
			Store.dispatch("login", user)
				.then((response) => {
					Store.dispatch("getCurrentUser")
						.then((resp) => {
							this.$router.push("/");
						})
						.catch((err) => {});
				})
				.catch((error) => {
					alert(error);
				});
		},
	},
};
</script>

<style></style>
