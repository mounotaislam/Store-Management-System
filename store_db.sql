

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_entrydate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_entrydate`) VALUES
(1, 'Stationary', '2021-12-03'),
(2, 'Electric', '2021-12-04'),
(3, 'Frouts', '2021-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prdouct_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_category` int(3) NOT NULL,
  `prdouct_code` varchar(10) NOT NULL,
  `prdocut_entry_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prdouct_id`, `product_name`, `product_category`, `prdouct_code`, `prdocut_entry_date`) VALUES
(1, 'Apple', 1, 'app001', '2022-01-01'),
(2, 'Khata', 1, 'kha001', '2022-01-01'),
(3, 'Computer', 2, 'com007', '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `spend_product`
--

CREATE TABLE `spend_product` (
  `spend_product_id` int(11) NOT NULL,
  `spend_product_name` int(11) NOT NULL,
  `spend_product_quentity` int(11) NOT NULL,
  `spend_product_entry_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spend_product`
--

INSERT INTO `spend_product` (`spend_product_id`, `spend_product_name`, `spend_product_quentity`, `spend_product_entry_date`) VALUES
(1, 3, 8, '2022-01-12'),
(2, 2, 10, '2022-01-01'),
(3, 1, 50, '2022-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `store_product`
--

CREATE TABLE `store_product` (
  `store_product_id` int(11) NOT NULL,
  `store_product_name` int(10) NOT NULL,
  `store_product_quentity` int(11) NOT NULL,
  `store_product_entry_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_product`
--

INSERT INTO `store_product` (`store_product_id`, `store_product_name`, `store_product_quentity`, `store_product_entry_date`) VALUES
(1, 2, 100, '2022-01-02'),
(2, 3, 30, '2021-12-02'),
(3, 1, 50, '2022-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`) VALUES
(1, 'Nazmus', 'Saud', 'saud@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prdouct_id`);

--
-- Indexes for table `spend_product`
--
ALTER TABLE `spend_product`
  ADD PRIMARY KEY (`spend_product_id`);

--
-- Indexes for table `store_product`
--
ALTER TABLE `store_product`
  ADD PRIMARY KEY (`store_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prdouct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spend_product`
--
ALTER TABLE `spend_product`
  MODIFY `spend_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_product`
--
ALTER TABLE `store_product`
  MODIFY `store_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
