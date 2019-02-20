<h2><?php echo $title; ?></h2>
 
<table border='1' cellpadding='4'>
<tr>
<td><strong>Title</strong></td>
<td><strong>Content</strong></td>
<td><strong>Action</strong></td>
</tr>
<?php foreach ($faqs as $faqs_item): ?>
<tr>
<td><?php echo $faqs_item['title']; ?></td>
<td><?php echo $faqs_item['text']; ?></td>
<td>
<a href="<?php echo site_url('faqs/'.$faqs_item['slug']); ?>">View</a> |
<a href="<?php echo site_url('faqs/edit/'.$faqs_item['id']); ?>">Edit</a> |
<a href="<?php echo site_url('faqs/delete/'.$faqs_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>