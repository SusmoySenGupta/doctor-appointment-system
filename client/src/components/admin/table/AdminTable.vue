<template>
	<!-- New Table -->
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
						<th class="px-4 py-3">User</th>
						<th class="px-4 py-3">Email</th>
						<th class="px-4 py-3">Phone no</th>
						<th class="px-4 py-3">Specialities</th>
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
						v-for="doctor in doctors"
						:key="doctor.id"
					>
						<td class="px-4 py-3">
							<div class="flex items-center text-sm">
								<div>
									<p class="font-semibold">
										{{ doctor.name ? doctor.name : "N/A" }}
									</p>
									<p
										class="
											text-xs text-gray-600
											dark:text-gray-400
										"
									>
										Doctor
									</p>
								</div>
							</div>
						</td>
						<td class="px-4 py-3 text-sm">
							{{ doctor.email ? doctor.email : "N/A" }}
						</td>
						<td class="px-4 py-3 text-xs">
							{{ doctor.phone_no ? doctor.phone_no : "N/A" }}
						</td>
                        <td class="px-4 py-3 text-xs">
							<div class="w-40 grid grid-cols-3 gap-2">
								<div v-for="speciality in doctor.specialities" :key="speciality" class="flex justify-center px-2.5 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                    {{ speciality.name }}
                                </div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</template>
<script>
import DoctorService from "../../../services/DoctorService";
import { ref } from "vue";

export default {
	async setup() {
		const response = ref(await DoctorService.getDoctors());
		const doctors = response.value.data.data;

		return {
			doctors,
		};
	},
};
</script>
