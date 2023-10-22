<div class="container">
      <div class="col-4 offset-4">
        <script src="assets/js/script.js"></script>
			<?php echo form_open(base_url().'secret_questions/submit_questions'); ?>
                <h2 class="text-center">Please select and answer 3 secret questions</h2>
                <p>Tip for setting security answers: Use a fake answer that cannot be verified by others</p>
                        <div class="form-group">
                            <label for="first_q">Question 1</label>
                            <select name="first_q">
                                <option value="">Please select a question</option>
                                <option value="option1">What city were you born in?</option>
                                <option value="option2">In what city or town did you meet your spouse or partner?</option>
                                <option value="option3">In what city or town did your parents meet?</option>
                                <option value="option4">What was the name of your first stuffed animal?</option>
                                <option value="option5">What was your childhood nickname?</option>
                                <option value="option6">What is the name of a college you applied to but didn't attend?</option>
                                <option value="option7">What was your driving instructor's first name?</option>
                            </select>
                            <label for="first_a">Answer</label>
                            <input type="text" class="form-control" required="required" name="first_a">
                        </div>
                        <div class="form-group">
                            <label for="second_q">Question 2</label>
                            <select name="second_q">
                                <option value="">Please select a question</option>
                                <option value="option1">What city were you born in?</option>
                                <option value="option2">In what city or town did you meet your spouse or partner?</option>
                                <option value="option3">In what city or town did your parents meet?</option>
                                <option value="option4">What was the name of your first stuffed animal?</option>
                                <option value="option5">What was your childhood nickname?</option>
                                <option value="option6">What is the name of a college you applied to but didn't attend?</option>
                                <option value="option7">What was your driving instructor's first name?</option>
                            </select>
                            <label for="second_a">Answer</label>
                            <input type="text" class="form-control" required="required" name="second_a">
                        </div>    
                        <div class="form-group">
                            <label for="third_q">Question 3</label>
                            <select name="third_q">
                                <option value="">Please select a question</option>
                                <option value="option1">What city were you born in?</option>
                                <option value="option2">In what city or town did you meet your spouse or partner?</option>
                                <option value="option3">In what city or town did your parents meet?</option>
                                <option value="option4">What was the name of your first stuffed animal?</option>
                                <option value="option5">What was your childhood nickname?</option>
                                <option value="option6">What is the name of a college you applied to but didn't attend?</option>
                                <option value="option7">What was your driving instructor's first name?</option>
                            </select>
                            <label for="third_a">Answer</label>
                            <input type="text" class="form-control" required="required" name="third_a">
                        </div>
                        <?php echo $error; ?>
                        <div class="form-group">
						    <button type="submit" class="btn btn-primary btn-block">Submit questions</button>
					    </div>
            <?php echo form_close(); ?>
	</div>
</div>