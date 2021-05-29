<template>
	<section class="flex flex-col items-center h-screen md:flex-row">
		<div class="hidden w-full h-screen bg-white lg:block md:w-1/3 lg:w-2/3">
			<img
				src="https://dummyimage.com/1000x800/F3F4F7/64748b"
				alt=""
				class="object-cover w-full h-full"
			/>
		</div>
		<div
			class="
				flex
				items-center
				justify-center
				w-full
				h-screen
				px-6
				bg-white
				md:max-w-md
				lg:max-w-full
				md:mx-auto
				md:w-1/2
				xl:w-1/3
				lg:px-16
				xl:px-12
			"
		>
			<div class="w-full h-100">
				<a
					class="
						flex
						items-center
						w-32
						mb-4
						font-medium
						text-blueGray-900
						title-font
						md:mb-0
					"
				>
					<div
						class="
							w-2
							h-2
							p-2
							mr-2
							rounded-full
							bg-gradient-to-tr
							from-blue-300
							to-blue-600
						"
					></div>
					<h2
						class="
							text-lg
							font-bold
							tracking-tighter
							text-black
							uppercase
							duration-500
							ease-in-out
							transform
							ttransition
							hover:text-lightBlue-500
							dark:text-blueGray-400
						"
					>
						Wickedblocks
					</h2>
				</a>
				<h1
					class="
						mt-12
						text-2xl
						font-semibold
						text-black
						tracking-ringtighter
						sm:text-3xl
						title-font
					"
				>
					Log in to your account
				</h1>
				<form class="mt-6" @submit.prevent="login(user)">
					<div>
						<label
							class="
								block
								text-sm
								font-medium
								leading-relaxed
								tracking-tighter
								text-gray-700
							"
							>Email Address</label
						>
						<input
							type="email"
							v-model="user.email"
							placeholder="Your Email "
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
								rounded-lg
								bg-gray-100
								focus:outline-none
								focus:border-gray-500
								focus:bg-white
								focus:shadow-outline
								focus:ring-2
								ring-offset-2 ring-offset-blue-300
							"
						/>
					</div>
					<div class="mt-4">
						<label
							class="
								block
								text-sm
								font-medium
								leading-relaxed
								tracking-tighter
								text-gray-700
							"
							>Password</label
						>
						<input
							type="password"
							v-model="user.password"
							placeholder="Your Password"
							minlength="6"
							class="
								w-full
								px-4
								py-2
								text-base text-black
								transition
								duration-500
								ease-in-out
								transform
								rounded-lg
								bg-gray-100
								focus:outline-none
								focus:border-gray-500
								focus:bg-white
								focus:shadow-outline
								focus:ring-2
								ring-offset-2 ring-offset-blue-300
							"
							required=""
						/>
					</div>
					<button
						type="submit"
						class="
							flex
							justify-center
							items-center
							gap-2
							w-full
							px-4
							py-3
							mt-6
							font-semibold
							text-white
							transition
							duration-100
							ease-in-out
							transform
							bg-black
							rounded-lg
							hover:bg-gray-800
							hover:to-black
							focus:shadow-outline
							focus:outline-none
							focus:ring-2
							ring-offset-current ring-offset-2
							active:bg-black
						"
					>
						Log In
						<span v-if="isLoading">
							<svg
								xmlns="http://www.w3.org/2000/svg"
								class="h-4 w-4 animate-spin"
								viewBox="0 0 20 20"
								fill="currentColor"
							>
								<path
									fill-rule="evenodd"
									d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
									clip-rule="evenodd"
								/>
							</svg>
						</span>
					</button>
				</form>
				<hr class="w-full my-6 border-gray-300" />

				<p class="mt-8 text-center">
					Need an account?
					<router-link
						:to="{ name: 'auth.register' }"
						class="font-semibold text-blue-500 hover:text-blue-700"
						>Sign Up</router-link
					>
				</p>
			</div>
		</div>
	</section>
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
			isLoading: false,
		};
	},
	methods: {
		login(user) {
			this.isLoading = true;
			Store.dispatch("login", user)
				.then(() => {
					Store.dispatch("getCurrentUser")
						.then((currentUserResponse) => {
							const ROLE_ID = currentUserResponse.data.role_id;
							this.isLoading = false;
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
