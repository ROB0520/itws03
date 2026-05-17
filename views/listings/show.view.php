<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>
<?= loadPartial('top-banner') ?>

<section class="container mx-auto p-4 mt-4">
	<div class="rounded-lg shadow-md bg-card p-3">
		<div class="flex justify-between items-center">
			<a class="block p-4 text-link" href="/listings">
				<i class="fa fa-arrow-alt-circle-left"></i>
				Back To Listings
			</a>
			<div class="flex space-x-4 ml-4">
				<a href="/edit" class="px-4 py-2 bg-accent hover:brightness-90 text-white rounded">Edit</a>
				<!-- Delete Form -->
				<form method="POST">
					<button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">Delete</button>
				</form>
				<!-- End Delete Form -->
			</div>
		</div>
		<div class="p-4">
			<h2 class="text-xl font-semibold">Software Engineer</h2>
			<p class="text-gray-700 text-lg mt-2">
				We are seeking a skilled software engineer to develop high-quality
				software solutions.
			</p>
			<ul class="my-4 bg-background p-4">
				<li class="mb-2"><strong>Salary:</strong> $80,000</li>
				<li class="mb-2">
					<strong>Location:</strong> New York
					<span
						class="text-xs bg-accent text-white rounded-full px-2 py-1 ml-2">Local</span>
				</li>
				<li class="mb-2">
					<strong>Tags:</strong> <span>Development</span>,
					<span>Coding</span>
				</li>
			</ul>
		</div>
	</div>
</section>

<section class="container mx-auto p-4">
	<h2 class="text-xl font-semibold mb-4">Job Details</h2>
	<div class="rounded-lg shadow-md bg-card p-4">
		<h3 class="text-lg font-semibold mb-2 text-link">
			Job Requirements
		</h3>
		<p>
			Bachelors degree in Computer Science or related field, 3+ years of
			software development experience
		</p>
		<h3 class="text-lg font-semibold mt-4 mb-2 text-link">Benefits</h3>
		<p>Healthcare, 401(k) matching, flexible work hours</p>
	</div>
	<p class="my-5">
		Put "Job Application" as the subject of your email and attach your
		resume.
	</p>
	<a
		href="mailto:manager@company.com"
		class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-tag-foreground bg-tag hover:bg-indigo-200">
		Apply Now
	</a>
</section>

<?= loadPartial('bottom-banner') ?>
<?= loadPartial('footer') ?>