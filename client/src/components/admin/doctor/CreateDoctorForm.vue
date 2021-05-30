<template>
	<div class="w-full overflow-hidden rounded-lg shadow-xs">
		<div class="w-full overflow-x-auto">
			<div
				class="
					px-4
					py-3
					mb-8
					bg-white
					rounded-lg
					shadow-md
					dark:bg-gray-800
				"
			>
				<form
					@submit.prevent="saveDoctor"
					class="flex flex-col gap-1.5"
				>
					<div class="w-full flex justify-between">
						<label class="block text-sm">
							<span class="text-gray-700 dark:text-gray-400">
								Name
							</span>
							<input
								class="
									block
									w-full
									mt-1
									text-sm
									dark:text-gray-300
									dark:bg-gray-700
									focus:border-purple-400
									focus:outline-none
									focus:shadow-outline-red
									form-input
									rounded
								"
								type="text"
								placeholder="name"
								v-model="formData.name"
							/>
						</label>
						<label class="block text-sm">
							<span class="text-gray-700 dark:text-gray-400">
								Email
							</span>
							<input
								class="
									block
									w-full
									mt-1
									text-sm
									dark:text-gray-300
									dark:bg-gray-700
									focus:border-purple-400
									focus:outline-none
									focus:shadow-outline-red
									form-input
									rounded
								"
								type="email"
								placeholder="email"
								v-model="formData.email"
							/>
						</label>
						<label class="block text-sm">
							<span class="text-gray-700 dark:text-gray-400">
								Phone number
							</span>
							<input
								class="
									block
									w-full
									mt-1
									text-sm
									dark:text-gray-300
									dark:bg-gray-700
									focus:border-purple-400
									focus:outline-none
									focus:shadow-outline-red
									form-input
									rounded
								"
								type="number"
								placeholder="phone number"
								v-model="formData.phone_no"
							/>
						</label>
					</div>
					<label class="block mt-4 text-sm">
						<span class="text-gray-700 dark:text-gray-400"
							>Address</span
						>
						<textarea
							class="
								block
								w-full
								mt-1
								text-sm
								dark:text-gray-300
								dark:border-gray-600
								dark:bg-gray-700
								form-textarea
								focus:border-purple-400
								focus:outline-none
								focus:shadow-outline-purple
								dark:focus:shadow-outline-gray
								rounded
							"
							rows="3"
							placeholder="address here..."
							spellcheck="false"
							v-model="formData.address"
						></textarea>
					</label>

					<label class="block text-sm">
						<span class="text-gray-700 dark:text-gray-400">
							Speciality / Specialities
						</span>
						<select
							class="
								block
								w-full
								mt-1
								text-sm
								dark:text-gray-300
								dark:bg-gray-700
								focus:border-purple-400
								focus:outline-none
								focus:shadow-outline-red
								form-input
								rounded
							"
							placeholder="phone number"
							multiple
							v-model="formData.specialities"
						>
							<option value="">--Select Speciality---</option>
							<option
								v-for="speciality in specialities"
								:key="speciality.id"
								:value="speciality.id"
							>
								{{ speciality.name }}
							</option>
						</select>
					</label>
					<label class="block text-sm mt-4">
						<div class="mb-2">
							<button
								class="
									w-auto
									flex
									items-center
									justify-center
									gap-1
									px-4
									py-2
									text-sm
									font-medium
									leading-5
									text-white
									transition-colors
									duration-150
									bg-purple-600
									border border-transparent
									rounded-lg
									active:bg-purple-600
									hover:bg-purple-700
									focus:outline-none
									focus:shadow-outline-purple
								"
								:disabled="isLoading || formData.name == ''"
								type="submit"
							>
								<span>Add Doctor</span>
								<span v-if="isLoading">
									<svg
										xmlns="http://www.w3.org/2000/svg"
										class="h-5 w-5 animate-spin"
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
						</div>
					</label>
				</form>
				<span
					v-if="status"
					class="
						text-sm
						px-2
						py-1
						font-semibold
						leading-tight
						text-green-700
						bg-green-100
						rounded-full
						dark:bg-green-700
						dark:text-green-100
					"
				>
					Save Successfull
				</span>
			</div>
		</div>
	</div>
</template>
<script>
import DoctorService from "../../../services/DoctorService";
import SpecialityService from "../../../services/SpecialityService";

export default {
	data() {
		return {
			formData: {
				name: "",
				email: "",
				phone_no: "",
				address: "",
				specialities: [],
			},
			specialities: null,
			isLoading: false,
			status: null,
		};
	},
	methods: {
		async saveDoctor() {
			this.isLoading = true;
			try {
				const response = await DoctorService.saveDoctor(this.formData);
				this.status = response.data.status;
				this.isLoading = false;
			} catch {
				this.isLoading = false;
				alert("Something went wrong.");
			}
		},

		getSpecialities() {
			SpecialityService.getSpecialities()
				.then((response) => {
					this.specialities = response.data.data;
				})
				.catch(() => {
					alert("Something went wrong");
				});
		},
	},

	mounted() {
		this.getSpecialities();
	},
};
</script>
