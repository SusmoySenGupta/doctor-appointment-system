<template>
	<div class="w-full overflow-hidden rounded-lg shadow-xs">
		<div class="w-full overflow-x-auto">
			<span
				v-if="successMessage"
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
			<table class="w-full whitespace-no-wrap">
				<thead>
					<tr
						class="
							text-xs
							font-semibold
							tracking-wide
							text-left text-gray-500
							uppercase
							border-b
							dark:border-gray-700
							bg-gray-50
							dark:text-gray-400
							dark:bg-gray-800
						"
					>
						<th class="px-4 py-3">#</th>
						<th class="px-4 py-3">Name</th>
						<th class="px-4 py-3">Created at</th>
						<th class="px-4 py-3">Action</th>
					</tr>
				</thead>
				<tbody
					class="
						bg-white
						divide-y
						dark:divide-gray-700
						dark:bg-gray-800
					"
				>
					<tr
						class="text-gray-700 dark:text-gray-400"
						v-for="(speciality, index) in specialities"
						:key="speciality.id"
					>
						<td class="px-4 py-3 text-sm">
							{{ index + 1 }}
						</td>
						<td class="px-4 py-3">
							<div class="flex items-center text-sm">
								<div>
									<p class="font-semibold">
										{{
											speciality.name
												? speciality.name
												: "N/A"
										}}
									</p>
								</div>
							</div>
						</td>
						<td class="px-4 py-3 text-xs">
							{{
								speciality.created_at
									? speciality.created_at
									: "N/A"
							}}
						</td>
						<td class="px-4 py-3 text-xs">
							<div class="flex items-center space-x-4 text-sm">
								<button
									class="
										flex
										items-center
										justify-between
										px-2
										py-2
										text-sm
										font-medium
										leading-5
										text-purple-600
										rounded-lg
										dark:text-gray-400
										focus:outline-none
										focus:ring-2 focus:ring-purple-500
										active:bg-purple-500
										active:text-white
									"
									aria-label="Edit"
									@click="openModel(index)"
								>
									<svg
										class="w-5 h-5"
										aria-hidden="true"
										fill="currentColor"
										viewBox="0 0 20 20"
									>
										<path
											d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
										></path>
									</svg>
								</button>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div
			v-show="isModalOpen"
			class="
				fixed
				inset-0
				z-30
				flex
				items-end
				bg-black bg-opacity-50
				sm:items-center
				sm:justify-center
			"
		>
			<div
				v-show="isModalOpen"
				class="
					w-full
					px-6
					py-4
					overflow-hidden
					bg-white
					rounded-t-lg
					dark:bg-gray-800
					sm:rounded-lg
					sm:m-4
					sm:max-w-xl
				"
				role="dialog"
				id="modal"
			>
				<header class="flex justify-end">
					<button
						class="
							inline-flex
							items-center
							justify-center
							w-6
							h-6
							text-gray-400
							transition-colors
							duration-150
							rounded
							dark:hover:text-gray-200
							hover:
							hover:text-gray-700
						"
						aria-label="close"
						@click="closeModal"
					>
						<svg
							class="w-4 h-4"
							fill="currentColor"
							viewBox="0 0 20 20"
							role="img"
							aria-hidden="true"
						>
							<path
								d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
								clip-rule="evenodd"
								fill-rule="evenodd"
							></path>
						</svg>
					</button>
				</header>
				<div class="mt-4 mb-6">
					<p
						class="
							mb-2
							text-lg
							font-semibold
							text-gray-700
							dark:text-gray-300
						"
					>
						Edit speciality
					</p>
					<form @submit.prevent="updateSpeciality">
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
								placeholder="Ex: Heart"
								v-model="formData.name"
							/>
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
									<span>Update Speciality</span>
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
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import SpecialityService from "../../../services/SpecialityService";
import { ref } from "vue";

export default {
	async setup() {
		const response = ref(await SpecialityService.getSpecialities());
		const specialities = response.value.data.data;
		const isModalOpen = ref(false);
		const isLoading = ref(false);
		const formData = ref({});
        const successMessage = ref(false);

		function openModel(index) {
			formData.value = specialities[index];
			isModalOpen.value = true;
		}

		function closeModal() {
			isModalOpen.value = false;
		}

		async function updateSpeciality() {
			isLoading.value = true;
			await SpecialityService.updateSpeciality(
				formData.value.id,
				formData.value
			)
				.then((response) => {
					isLoading.value = false;
					closeModal();
                    successMessage.value = true;
				})
				.catch((error) => {
					alert(error);
				});
		}

		return {
			specialities,
			isModalOpen,
			openModel,
			closeModal,
			updateSpeciality,
			isLoading,
			formData,
            successMessage
		};
	},
};
</script>
