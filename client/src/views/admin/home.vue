<template>
	<div class="container px-6 mx-auto grid">
		<h2
			class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
		>
			Dashboard
		</h2>
		<Card></Card>
		<suspense>
			<template #default>
				<AdminTable></AdminTable>
			</template>
			<template #fallback>
				<AdminTableSkeleton />
			</template>
		</suspense>
		<!-- <AdminTableSkeleton /> -->
	</div>
</template>

<script setup>
import Card from "../../components/Card.vue";
import AdminTable from "../../components/admin/table/AdminTable.vue";
import AdminTableSkeleton from "../../components/admin/table/AdminTableSkeleton.vue";
</script>

<style></style>
