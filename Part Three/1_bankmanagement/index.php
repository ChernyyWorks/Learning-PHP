<?php

class BankClient {
    // Personnal information
    private string $firstname;
    private string $lastname;
    private string $dob;
    
    private string $city;

    // Acounts
    private string $uuid;

    private array $account_main = array(
        "currency" => "$",
        "amount" => 0.0,
    );
    private array $account_saving = array(
        "currency" => "$",
        "amount" => 0.0,
    );

    // Arguments
    public function __construct(string $firstname, string $lastname, string $dob, string $city) {
        // Personnal properties
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->dob = $dob;
        $this->city = $city;

        // UUID generation
        $this->uuid = "MyCoolBank_".rand(1, 999999);

        echo "id : ".$this->uuid."<br>";


        // Printing Creation data
        echo $firstname." ".$lastname." just created an account at MyCoolBank's in ".$city." !";
    }

    // Accounts Getter & Setter
    public function getAccountData(string $accounttype) {
        // Main account
        if ($accounttype == "main") {
            return($this->account_main);
        // Saving account
        } elseif ($accounttype == "saving") {
            return($this->account_saving);
        // returning 0 if input isn't correct
        } else {
            return(0);
        }
    }

    public function setAccountAmount(string $accounttype, float $amount) {
        // Adding money to main account
        if ($accounttype == "main" && $amount >= 0) {
            $this->account_main["amount"] = $amount;
        // Adding money to saving account
        } elseif ($accounttype == "saving" && $amount >= 0) {
            $this->account_saving["amount"] = $amount;
        // returning 0 if input isn't correct
        } else {
            return(0);
        }
    }
}

$Ludwig = new BankClient("Ludwig","Meyer",date("d-m-y"),"Munich");
echo "<br> ----- <br>";
echo $Ludwig->getAccountData("main")["amount"].$Ludwig->getAccountData("main")["currency"]." sur le compte !";
$Ludwig->setAccountAmount("main",956.15);
echo "<br> ----- <br>";
echo $Ludwig->getAccountData("main")["amount"].$Ludwig->getAccountData("main")["currency"]." sur le compte !";