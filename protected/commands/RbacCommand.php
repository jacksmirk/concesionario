<?php
class RbacCommand extends CConsoleCommand
{

    private $_authManager;


    public function getHelp()
    {

        $description = "DESCRIPTION\n";
        $description .= '    '."This command generates an initial RBAC authorization hierarchy.\n";
        return parent::getHelp() . $description;
    }


    /**
     * The default action - create the RBAC structure.
     */
    public function actionIndex()
    {

        $this->ensureAuthManagerDefined();

        //provide the oportunity for the use to abort the request
        $message = "This command will create three roles: Owner, Member, and Reader\n";
        $message .= " and the following permissions:\n";
        $message .= "create, read, update and delete user\n";
        $message .= "create, read, update and delete vehiculo\n";
        $message .= "create, read, update and delete compra\n";
        $message .= "Would you like to continue?";

        //check the input from the user and continue if
        //they indicated yes to the above question
        if($this->confirm($message))
        {
            //first we need to remove all operations,
            //roles, child relationship and assignments
            $this->_authManager->clearAll();

            //create the lowest level operations for users
            $this->_authManager->createOperation(
                "createUser",
                "create a new user");
            $this->_authManager->createOperation(
                "readUser",
                "read user profile information");
            $this->_authManager->createOperation(
                "updateUser",
                "update a users in-formation");
            $this->_authManager->createOperation(
                "deleteUser",
                "remove a user from a project");

            //create the lowest level operations for vehiculos
            $this->_authManager->createOperation(
                "createVehiculo",
                "create a new vehiculo");
            $this->_authManager->createOperation(
                "readVehiculo",
                "read Vehiculo information");
            $this->_authManager->createOperation(
                "updateVehiculo",
                "update Vehiculo information");
            $this->_authManager->createOperation(
                "deleteVehiculo",
                "delete a Vehiculo");

            //create the lowest level operations for compras
            $this->_authManager->createOperation(
                "createCompra",
                "create a new Compra");
            $this->_authManager->createOperation(
                "readCompra",
                "read Compra information");
            $this->_authManager->createOperation(
                "updateCompra",
                "update Compra information");
            $this->_authManager->createOperation(
                "deleteCompra",
                "delete an Compra from a Vehiculo");

            //create the reader role and add the appropriate
            //permissions as children to this role
            $role=$this->_authManager->createRole("reader");
            $role->addChild("readUser");
            $role->addChild("readVehiculo");
            $role->addChild("readCompra");

            //create the member role, and add the appropriate
            //permissions, as well as the reader role itself, as children
            $role=$this->_authManager->createRole("member");
            $role->addChild("reader");
            $role->addChild("createCompra");
            $role->addChild("updateCompra");
            $role->addChild("deleteCompra");

            //create the owner role, and add the appropriate permissions,
            //as well as both the reader and member roles as children
            $role=$this->_authManager->createRole("owner");
            $role->addChild("reader");
            $role->addChild("member");
            $role->addChild("createUser");
            $role->addChild("updateUser");
            $role->addChild("deleteUser");
            $role->addChild("createVehiculo");
            $role->addChild("updateVehiculo");
            $role->addChild("deleteVehiculo");

            //provide a message indicating success
            echo "Authorization hierarchy successfully generated.\n";
        }
        else
            echo "Operation cancelled.\n";
    }

    public function actionDelete()
    {
        $this->ensureAuthManagerDefined();
        $message = "This command will clear all RBAC definitions.\n";
        $message .= "Would you like to continue?";
        //check the input from the user and continue if they indicated
        //yes to the above question
        if($this->confirm($message))
        {
            $this->_authManager->clearAll();
            echo "Authorization hierarchy removed.\n";
        }
        else
            echo "Delete operation cancelled.\n";

    }

    protected function ensureAuthManagerDefined()
    {
        //ensure that an authManager is defined as this is mandatory for creating an auth hierarchy
        if(($this->_authManager=Yii::app()->authManager)===null)
        {
            $message = "Error: an authorization manager, named 'authManager' must be con-figured to use this command.";
            $this->usageError($message);
        }
    }
}