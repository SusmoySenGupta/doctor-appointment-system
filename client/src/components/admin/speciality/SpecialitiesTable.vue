<template>
	<div class="w-full overflow-hidden rounded-lg shadow-xs">
		<div class="w-full overflow-x-auto">
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
								<router-link to="#">
									<a
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
											focus:shadow-outline-gray
										"
										aria-label="Edit"
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
									</a>
								</router-link>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>
<script>
import DoctorService from "../../../services/SpecialityService";
import { ref } from "vue";

export default {
	async setup() {
		const response = ref(await DoctorService.getSpecialities());
		const specialities = response.value.data.data;

		return {
			specialities,
		};
	},
};
</script>
