   function confirmCreateRole(email) {
    var role = prompt("Enter a role for " + email + ":");
    if (role !== null) {
        var confirmCreate = confirm("Are you sure you want to create the role for " + email + "?");
        if (confirmCreate) {
            var form = document.createElement("form");
            form.action = "./dash_admin.php"; 
            form.method = "POST";
            
            var emailInput = document.createElement("input");
            emailInput.type = "hidden";
            emailInput.name = "emailToCreate";
            emailInput.value = email;
            
            var roleInput = document.createElement("input");
            roleInput.type = "hidden";
            roleInput.name = "roleToCreate";
            roleInput.value = role;
            
            var createInput = document.createElement("input");
            createInput.type = "hidden";
            createInput.name = "confirmCreateRole";
            
            form.appendChild(emailInput);
            form.appendChild(roleInput);
            form.appendChild(createInput);
            document.body.appendChild(form);
            form.submit();
        }
    }
}
    function confirmUpdateRole(email) {
    var confirmUpdate = confirm("Are you sure you want to update the role for " + email + "?");
    if (confirmUpdate) {
        var form = document.createElement("form");
        form.action = "./dash_admin.php"; 
        form.method = "POST";
        
        var emailInput = document.createElement("input");
        emailInput.type = "hidden";
        emailInput.name = "emailToUpdate";
        emailInput.value = email;
        
        var updateInput = document.createElement("input");
        updateInput.type = "hidden";
        updateInput.name = "confirmUpdateRole";
        
        form.appendChild(emailInput);
        form.appendChild(updateInput);
        document.body.appendChild(form);
        form.submit();
    }
}

function confirmDeleteRole(email) {
    var confirmDelete = confirm("Are you sure you want to delete the role for " + email + "?");
    if (confirmDelete) {
        var form = document.createElement("form");
        form.action = "./dash_admin.php"; 
        form.method = "POST";
        
        var emailInput = document.createElement("input");
        emailInput.type = "hidden";
        emailInput.name = "emailToDelete";
        emailInput.value = email;
        
        var deleteInput = document.createElement("input");
        deleteInput.type = "hidden";
        deleteInput.name = "confirmDeleteRole";
        
        form.appendChild(emailInput);
        form.appendChild(deleteInput);
        document.body.appendChild(form);
        form.submit();
    }
}