#tradingview 

[LNL Trend System — 由 lnlcapital 提供的指標 — TradingView](https://tw.tradingview.com/script/m0G2Xv7r-LNL-Trend-System/)

LNL 趋势系统是一种基于 ATR（平均真实波动范围）的日间交易系统，专为日内交易者和抄底者设计。该系统适用于任何图表时间框架，并可以应用于任何市场。该系统包括两个部分 - 趋势线和停止线。趋势系统基于一种特殊的 ATR 计算，通过结合 13 EMA（指数移动平均线）的前值与 ATR，创建出一条看似普通移动平均线但实际上产生非常不同结果的偏差线，尤其在横盘市场中。


![jMmNWO](https://img.forecho.com/jMmNWO.png)


这张图显示了苹果公司（AAPL）在纳斯达克交易所的股票价格趋势，并用不同的颜色和线条表示了多空趋势。以下是图片中的英文说明及其中文翻译：

1. Strong bullish trend = green Trend Bars green Trend Line and green Stop Lines.
   强烈的多头趋势 = 绿色趋势柱、绿色趋势线和绿色停止线。
2. Flip Setup: Once the 5 min Stop Line is broken, the very first opposing Stop Line touch after the Trend System flips is usually a high probability bounce.
   反转设置：一旦 5 分钟停止线被突破，在趋势系统翻转后第一次触及相反的停止线通常是一个高概率的反弹。
3. Whenever the Stop Lines start to mirror each other, that means that is a ranging market. (Yes, both sides can be faded.)
   每当停止线开始相互映射，那就意味着市场处于区间波动。（是的，两边都可能减弱。）
4. The Stop Line creates optimal buy & sell areas within any market environment. In an oscillating markets, the Trend Line (the moving average) works great as a mean gauge.
   停止线在任何市场环境中创造了最佳的买入和卖出区域。在波动的市场中，趋势线（移动平均线）作为平均值衡量工具表现优异。
5. LNL Trend System can be used on any type of market, on any time frame and in any market environment. It is an ATR based tool. ATR works on all types of markets!
   LNL 趋势系统可以应用于任何类型的市场、任何时间框架和任何市场环境。这是一个基于 ATR 的工具。ATR 适用于所有类型的市场！
6. Gray Trend Bars and gray Trend Line is another good sign of a ranging market environment.
   灰色趋势柱和灰色趋势线是另一个区间市场环境的好信号。
7. Strong bearish trend = red Trend Bars red Trend Line & Stop Lines.
   强烈的空头趋势 = 红色趋势柱、红色趋势线和红色停止线。


-----

**趋势线**：趋势线是一个简单的线条，基本上是一个快速的量表，由 13 EMA 表示，根据由多个平均数（8,13,21,34 EMA）定义的当前趋势结构改变颜色。趋势线的作用是简单地增加当前趋势的一致性。线条的颜色基本上是不言自明的。每当线条变红时，表示当前结构是看跌的。反之亦然，绿线表示看涨。灰线代表中性市场结构。

**停止线**：停止线是一个基于前一条柱 ATR 和价格相对于当前和前一 13 EMA 值的位置的特殊计算的 ATR 偏差线。正如已经提到的，这创造了一个 ATR 偏差标记，要么在价格上方，要么在价格下方，直到它们接触。每当价格触及停止线时，意味着它正在进行向上或向下的 ATR 扩张移动。这种触摸通常会导致反应（反弹），为交易提供机会。

**趋势条**：打开时，趋势条可以提供当前趋势的额外一致性，连同趋势线颜色。趋势条基于 DMI 和 ADX 指标。每当 DMI 看跌且 ADX 高于 20 时，蜡烛会变红。反之亦然，对于绿色蜡烛和看涨 DMI。每当 ADX 跌破 20 时，蜡烛是中性的（灰色），这意味着当前没有真正的趋势。

**趋势模式**：总共有 5 种不同的趋势模式可供选择。每种模式都以不同的 ATR 设置进行可视化，提供更激进或更保守的方法。模式越紧，价格与停止线之间的距离就越近。前两种模式是为缓慢市场设计的，而“宽松”和“FOMC”模式更适合波动性高的产品。

![kzmmOn](https://img.forecho.com/kzmmOn.png)

图片上的英文说明及其中文翻译如下：

1. "The 'Net' trend mode allows you to see all the different trend modes at the same time which visually creates the net effect. Some traders might prefer this mode since it suits well to scale-in scale-out trading methods." “'网格'趋势模式允许您同时看到所有不同的趋势模式，这在视觉上创造了网格效应。一些交易者可能更喜欢这种模式，因为它很适合分阶段买入卖出的交易方法。”
    
2. "Stop Lines mirroring each other? = Ranging market!" “停止线相互映射？= 区间市场！”

--------

趋势模式：

1. `Tight` 适用于最慢的市场。最慢的市场可以是任何平均真实范围值异常小或简单地是具有“沉睡者”个性的市场。紧凑模式也可用于在最荒谬的趋势中进行激进进入。有时价格几乎不会回调到趋势线，更不用说停止线了。
2. `Normal` 正常模式是模式之间的黄金平均数。“正常”提供了最常用市场（如标准普尔期货（ES）或 SPY、AAPL 和许多其他高度受欢迎的股票）的理想 ATR 长度。通常情况下，只要没有突发新闻或高影响力市场事件，就会尊重这种模式的长度。
3.  `Loose` “宽松”模式基本上是正常模式，但稍微宽松一些。每当 ATR 跳高于平时或在高度期待的新闻事件期间，这种模式就很有用。这种模式也更适合更活跃的市场，如 NQ 期货。
4. `FOMC` FOMC 模式之所以称为 FOMC，是有原因的。这种模式在价格与停止线之间提供了最大量的摆动空间。这种模式是为极端波动、突发新闻事件或 FOMC 后交易而设计的。如果市场平静下来，这种模式不会像其他模式那样频繁地触及停止线，因此在平均波动性市场上运行它并不是很有用。虽然从未经过适当测试，但也许 FOMC 模式可以在加密市场中找到其价值？
5. `The Net` 网模式基本上是将所有模式结合成一个停止线系统，从而产生“网”效应。网模式提供了最宽的停止线区域，这主要受到喜欢使用逐步进出方法进行交易的交易者的欢迎。更不用说指标在网模式开启时的视觉效果看起来非常棒。

**高时框（HTF）趋势系统**：该系统还包括额外的高时框（HTF）趋势系统。这可以通过手动 HTF 模式设置为任何时间框架。设置为“自动”的 HTF 模式将根据聚合的适宜性自动选择最合适的高时框趋势系统。对于低于 5 分钟的所有内容，HTF 趋势系统将保持在 5 分钟。5-15 分钟之间=30 分钟。30 分钟 -120 分钟将转为 240 分钟。180 分钟及以上将转为每日时间框架。每日以上将转为每周 HTF 聚合，每周以上=每月，每月以上=每季。

![lPjo73](https://img.forecho.com/lPjo73.png)


以下是图片中的英文说明以及它们的中文翻译：

1. "Lower time frame Trend System with the background cloud turned OFF." "较低时间框架趋势系统，背景云图已关闭。"
    
2. "There is an option to turn on the HTF (higher time frame) trend system. HTF Trend System can be used as a higher time frame confluence or gauge for the day." "有一个选项可以开启 HTF（更高时间框架）趋势系统。HTF 趋势系统可以用作当日的更高时间框架汇合点或衡量标准。"

----

**背景云**：在可视化方面，每个趋势系统都可以通过输入设置进行完全自定义。还有一个选项，可以打开/关闭停止线后面的背景云。这些云可以使图表更清晰和可见。

**提示与技巧**：

1. 不同的趋势模式 在不同市场尝试不同模式。没有一种单一模式适合每个人在同一类型的市场上。我自己实际上更喜欢比正常更宽松的模式。
    
2. 停止线镜像 每当停止线开始相互镜像（价格上方和下方各有一条）时，这意味着价格正在进入一个横向盘整市场。价格首先触及哪个停止线并不重要。在其中一个翻转之前，它们都可以被淡化。
    
3. 盘整市场的迹象 注意盘整市场的迹象。每当趋势系统不管是在趋势线还是趋势条上失去颜色，如果一切都变成中性（灰色），这通常是接下来时刻范围类型动作的坚实迹象。正如前面已经提到的，停止线镜像也是盘整市场的一个好迹象。
    
4. 跟踪工具，趋势系统作为额外的研究？如果您不喜欢多彩的绿色/红色图表和蜡烛。您可以关闭所有这些，只留下停止线。这样，您可以利用趋势系统的优势，并在其上使用其他研究。这类似于抛物线 SAR 经常被使用的方式。
    
5. 翻转设置我最喜欢的交易之一是 5 分钟图表上的翻转设置。每当停止线被打破，趋势系统翻转后的第一个相反触摸通常是一个高度参与的触摸。如果有强烈的反应，这意味着这可能是新趋势的开始。一旦我进入位置，我喜欢在 1 分钟图表上跟踪停止线。

![t3m8Vy](https://img.forecho.com/t3m8Vy.png)
