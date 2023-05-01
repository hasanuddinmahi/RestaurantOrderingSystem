<?php


?> 

<div class="main-content-body">
    <div class="main-content-body-title">
        <h2></h2>
    </div>
    <div class="dashboard-overview">
        <div class="recent-order-request">
            <div class="recent-order-request-head">
                <h2>Recent Order Request</h2>
                <a href="#">View all</a>
            </div>
            <div class="recent-order-request-body">
                <div class="table">
                    <div class="table-row">
                        <div class="table-head">
                            <p>Food item</p>
                        </div>
                        <div class="table-head"></div>
                        <div class="table-head">
                            <p>Price</p>
                        </div>
                        <div class="table-head">
                            <p>Product ID</p>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell flex">
                            <img src="<?php echo SITEURL ?>/public/media/food1.png" alt="food" />
                            <p>Pizza</p>
                        </div>
                        <div class="table-cell"></div>
                        <div class="table-cell">
                            <p>$10</p>
                        </div>
                        <div class="table-cell">
                            <p>22213</p>
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell flex">
                            <img src="<?php echo SITEURL ?>/public/media/food2.png" alt="food" />
                            <p>Pizza</p>
                        </div>
                        <div class="table-cell"></div>
                        <div class="table-cell">
                            <p>$10</p>
                        </div>
                        <div class="table-cell">
                            <p>22213</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="recent-order-request">
            <div class="recent-order-request-head">
                <h2>Monthly Revenue</h2>
                <select name="month">
                    <option name="January" value="Jan">January</option>
                    <option name="February" value="Feb">February</option>
                    <option name="March" value="Mar">March</option>
                    <option name="April" value="Apr">April</option>
                    <option name="May" value="May">May</option>
                    <option name="June" value="Jun">June</option>
                    <option name="July" value="Jul">July</option>
                    <option name="August" value="Aug">August</option>
                    <option name="September" value="Sep">September</option>
                    <option name="October" value="Oct">October</option>
                    <option name="November" value="Nov">November</option>
                    <option name="December" value="Dec">December</option>
                </select>
            </div>
            <div class="monthly-revenue">
                <h2>Month 1</h2>
                <div id="myProgress">
                    <div id="myBar">35%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="trending-orders">
        <div class="recent-order-request">
            <div class="recent-order-request-head">
                <h2>Trending orders</h2>
            </div>
            <div class="trending-orders-items">
                <div class="trending-item">
                    <div class="trending-item-img">
                        <img src="<?php echo SITEURL ?>/public/media/photo-1594007654729-407eedc4be65.jpg" alt="" />
                    </div>
                    <div class="trending-item-details">
                        <p>Pizza</p>
                        <p>$25</p>
                    </div>
                    <div class="trending-item-details">
                        <p>Orders 15</p>
                        <p>Income $333</p>
                    </div>
                </div>
                <div class="trending-item">
                    <div class="trending-item-img">
                        <img src="<?php echo SITEURL ?>/public/media/photo-1559496417-e7f25cb247f3.jpg" alt="" />
                    </div>
                    <div class="trending-item-details">
                        <p>Coffee</p>
                        <p>$25</p>
                    </div>
                    <div class="trending-item-details">
                        <p>Orders 12</p>
                        <p>Income $23</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>