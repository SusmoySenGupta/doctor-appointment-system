<template>
	<form @submit.prevent="register(formData)">
		<section class="text-gray-700">
			<div class="container items-center px-5 py-12 lg:px-20">
				<div
					class="
						flex flex-col
						w-full
						p-10
						mx-auto
						my-6
						transition
						duration-500
						ease-in-out
						transform
						bg-white
						border
						rounded-lg
						lg:w-2/6
						md:w-1/2
						md:mt-0
					"
				>
					<h1
						class="
							mb-4
							text-xl
							font-semibold
							text-black
							tracking-ringtighter
							sm:text-3xl
							title-font
						"
					>
						Sign up
					</h1>
					<hr />
					<div class="mt-4 flex flex-col gap-2 mb-2 lg:flex-row">
						<div class="w-1/2">
							<div class="relative">
								<label
									for="name"
									class="text-base leading-7 text-gray-500"
									>Name</label
								>
								<input
									type="text"
									v-model="formData.name"
									placeholder="name"
									class="
										w-full
										px-4
										py-2
										mt-2
										text-base text-black
										transition
										duration-500
										ease-in-out
										transform
										border-transparent
										rounded-lg
										bg-gray-100
										focus:border-gray-500
										focus:bg-white
										focus:outline-none
										focus:shadow-outline
										focus:ring-2
										ring-offset-current ring-offset-2
									"
								/>
							</div>
						</div>
						<div class="w-1/2">
							<div class="relative">
								<label
									for="email"
									class="text-base leading-7 text-gray-500"
									>Email</label
								>
								<input
									type="email"
									v-model="formData.email"
									placeholder="name"
									class="
										w-full
										px-4
										py-2
										mt-2
										text-base text-black
										transition
										duration-500
										ease-in-out
										transform
										border-transparent
										rounded-lg
										bg-gray-100
										focus:border-gray-500
										focus:bg-white
										focus:outline-none
										focus:shadow-outline
										focus:ring-2
										ring-offset-current ring-offset-2
									"
								/>
							</div>
						</div>
					</div>
					<div class="relative">
						<label
							for="password"
							class="text-base leading-7 text-gray-500"
							>Password</label
						>
						<input
							type="password"
							v-model="formData.password"
							placeholder="password"
							class="
								w-full
								px-4
								py-2
								mt-2
								text-base text-black
								transition
								duration-500
								ease-in-out
								transform
								border-transparent
								rounded-lg
								bg-gray-100
								focus:border-gray-500
								focus:bg-white
								focus:outline-none
								focus:shadow-outline
								focus:ring-2
								ring-offset-current ring-offset-2
							"
						/>
					</div>
					<div class="relative">
						<label
							for="password"
							class="text-base leading-7 text-gray-500"
							>Confirm Password</label
						>
						<input
							type="password"
							v-model="formData.password_confirmation"
							placeholder="confirm password"
							class="
								w-full
								px-4
								py-2
								mt-2
								text-base text-black
								transition
								duration-500
								ease-in-out
								transform
								border-transparent
								rounded-lg
								bg-gray-100
								focus:border-gray-500
								focus:bg-white
								focus:outline-none
								focus:shadow-outline
								focus:ring-2
								ring-offset-current ring-offset-2
							"
						/>
					</div>
					<button
						type="submit"
						class="
							w-full
							px-16
							py-2
							mt-6
							mb-2
							mr-2
							text-white
							transition
							duration-500
							ease-in-out
							transform
							bg-blue-600
							border-blue-600
							rounded-md
							text-base
							focus:shadow-outline
							focus:outline-none
							focus:ring-2
							ring-offset-current ring-offset-2
							hover:bg-blue-800
						"
					>
						Sign Up
					</button>
				</div>
			</div>
		</section>
	</form>
</template>

<script>
import AuthenticationService from "../../services/AuthenticationService";
export default {
	name: "register-component",
	data() {
		return {
			formData: {
				name: "",
				email: "",
				password: "",
				password_confirmation: "",
			},
		};
	},
	methods: {
		async register() {
			try {
				const response = await AuthenticationService.register(
					this.formData
				);
                const user = {
                    email: this.formData.email,
                    password: this.formData.password
                };
                this.login(user);
				
			} catch {
				alert("Something went wrong.");
			}
		},

        login(user) {
			Store.dispatch("login", user)
				.then(() => {
					Store.dispatch("getCurrentUser")
						.then((currentUserResponse) => {
							const ROLE_ID = currentUserResponse.data.role_id;
							if (ROLE_ID === 1) {
								this.$router.push({ name: "admin.home" });
							} else if (ROLE_ID === 2) {
								this.$router.push({ name: "doctor.home" });
							} else if (ROLE_ID === 3) {
								this.$router.push({ name: "patient.home" });
							}
						})
						.catch((getCurrentUserError) => {
							alert(getCurrentUserError);
						});
				})
				.catch((loginError) => {
					alert(loginError);
				});
		},
	},
};
</script>

<style></style>
