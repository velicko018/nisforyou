<?php
	class User
	{
		public $username;
		public $password;
		public $name;
		public $email;
		public $address;
		public $telephone;
		public $birthyear;
        public $reg_date;
        public $admin;
		
		function __construct($u,$p,$n,$e,$a,$t,$b,$r,$admin)
		{
			$this->username=$u;
			$this->password=$p;
			$this->name=$n;
			$this->email=$e;
			$this->address=$a;
			$this->telephone=$t;
			$this->birthyear=$b;
            $this->reg_date=$r;
            $this->admin=$admin;
		}
	}