<style>
/* Form Card */
fieldset {
    background: #fff;
    border: 1px solid #eee;
    border-radius: 10px;
    padding: 25px;
    margin-top: 20px;
    box-shadow: 0 3px 10px rgba(0,0,0,.08);
}

/* Labels */
.form-group label {
    font-weight: 600;
    color: #333;
    margin-bottom: 6px;
}

/* Inputs */
.form-control {
    height: 45px;
    border-radius: 8px;
    border: 1px solid #dcdcdc;
    box-shadow: none;
    transition: all .3s ease;
}

/* Textareas */
textarea.form-control {
    height: auto;
    resize: vertical;
}

/* Focus */
.form-control:focus {
    border-color: #F97316;
    box-shadow: 0 0 0 3px rgba(249,115,22,.15);
}

/* Select */
select.form-control {
    cursor: pointer;
}

/* Placeholder */
.form-control::placeholder {
    color: #999;
}

/* Submit Button */
.btn-warning {
    background: linear-gradient(120deg, #FB923C, #F97316);
    border: none;
    color: #fff;
    font-weight: 600;
    padding: 10px 35px;
    border-radius: 8px;
    transition: .3s;
}

.btn-warning:hover,
.btn-warning:focus {
    background: linear-gradient(120deg, #F97316, #EA580C);
    color: #fff;
    transform: translateY(-2px);
}

/* Form spacing */
.form-group {
    margin-bottom: 18px;
}

/* Required star */
label::after {
    color: #dc3545;
}

/* Responsive */
@media (max-width: 767px) {
    fieldset {
        padding: 15px;
    }

    .btn-warning {
        width: 100%;
    }
}
</style>
<fieldset>
    <div class="row">

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="job_title">Job Title *</label>
                <input type="text" name="job_title" id="job_title"
                    value="<?php echo htmlspecialchars($edit ? $customer['job_title'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="e.g. ASP.NET Developer"
                    class="form-control" required>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="department">Department *</label>
                <input type="text" name="department" id="department"
                    value="<?php echo htmlspecialchars($edit ? $customer['department'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="e.g. IT"
                    class="form-control" required>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="vacancies">Number of Open Positions *</label>
                <input type="number" name="vacancies" id="vacancies"
                    value="<?php echo htmlspecialchars($edit ? $customer['vacancies'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="Enter number of vacancies"
                    class="form-control" min="1" required>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="employment_type">Employment Type *</label>
                <select name="employment_type" id="employment_type" class="form-control" required>
                    <option value="">Select Employment Type</option>
                    <option value="Full Time" <?php echo ($edit && $customer['employment_type']=='Full Time') ? 'selected' : ''; ?>>Full Time</option>
                    <option value="Part Time" <?php echo ($edit && $customer['employment_type']=='Part Time') ? 'selected' : ''; ?>>Part Time</option>
                    <option value="Contract" <?php echo ($edit && $customer['employment_type']=='Contract') ? 'selected' : ''; ?>>Contract</option>
                    <option value="Internship" <?php echo ($edit && $customer['employment_type']=='Internship') ? 'selected' : ''; ?>>Internship</option>
                </select>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="work_mode">Work Mode *</label>
                <select name="work_mode" id="work_mode" class="form-control" required>
                    <option value="">Select Work Mode</option>
                    <option value="On-site" <?php echo ($edit && $customer['work_mode']=='On-site') ? 'selected' : ''; ?>>On-site</option>
                    <option value="Hybrid" <?php echo ($edit && $customer['work_mode']=='Hybrid') ? 'selected' : ''; ?>>Hybrid</option>
                    <option value="Remote" <?php echo ($edit && $customer['work_mode']=='Remote') ? 'selected' : ''; ?>>Remote</option>
                </select>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="location">Job Location *</label>
                <input type="text" name="location" id="location"
                    value="<?php echo htmlspecialchars($edit ? $customer['location'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="e.g. Pune, Maharashtra"
                    class="form-control" required>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="experience">Experience Required *</label>
                <input type="text" name="experience" id="experience"
                    value="<?php echo htmlspecialchars($edit ? $customer['experience'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="e.g. 2-5 Years"
                    class="form-control" required>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="education">Minimum Qualification</label>
                <input type="text" name="education" id="education"
                    value="<?php echo htmlspecialchars($edit ? $customer['education'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="e.g. Bachelor's Degree"
                    class="form-control">
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="salary">Salary Range</label>
                <input type="text" name="salary" id="salary"
                    value="<?php echo htmlspecialchars($edit ? $customer['salary'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    placeholder="e.g. ₹4,00,000 - ₹6,00,000"
                    class="form-control">
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="application_deadline">Application Deadline</label>
                <input type="date" name="application_deadline" id="application_deadline"
                    value="<?php echo htmlspecialchars($edit ? $customer['application_deadline'] : '', ENT_QUOTES, 'UTF-8'); ?>"
                    class="form-control">
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="status">Status *</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Open" <?php echo ($edit && $customer['status']=='Open') ? 'selected' : ''; ?>>Open</option>
                    <option value="Draft" <?php echo ($edit && $customer['status']=='Draft') ? 'selected' : ''; ?>>Draft</option>
                    <option value="Closed" <?php echo ($edit && $customer['status']=='Closed') ? 'selected' : ''; ?>>Closed</option>
                    <option value="On Hold" <?php echo ($edit && $customer['status']=='On Hold') ? 'selected' : ''; ?>>On Hold</option>
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="skills">Required Skills *</label>
                <textarea name="skills" id="skills" rows="3"
                    placeholder="e.g. ASP.NET, SQL Server, C#, HTML, CSS"
                    class="form-control" required><?php echo htmlspecialchars($edit ? $customer['skills'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="job_description">Job Description *</label>
                <textarea name="job_description" id="job_description" rows="6"
                    placeholder="Enter job description..."
                    class="form-control" required><?php echo htmlspecialchars($edit ? $customer['job_description'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <div class="form-group">
                <button type="submit" class="btn btn-warning">
                    Save <span class="glyphicon glyphicon-floppy-disk"></span>
                </button>
            </div>
        </div>

    </div>
</fieldset>