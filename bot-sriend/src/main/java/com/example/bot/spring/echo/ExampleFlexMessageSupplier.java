package com.example.bot.spring.echo;

import java.util.Arrays;
import java.util.function.Supplier;

import com.linecorp.bot.model.action.URIAction;
import com.linecorp.bot.model.message.FlexMessage;
import com.linecorp.bot.model.message.flex.component.Box;
import com.linecorp.bot.model.message.flex.component.Button;
import com.linecorp.bot.model.message.flex.component.Button.ButtonHeight;
import com.linecorp.bot.model.message.flex.component.Button.ButtonStyle;
import com.linecorp.bot.model.message.flex.component.Icon;
import com.linecorp.bot.model.message.flex.component.Image;
import com.linecorp.bot.model.message.flex.component.Image.ImageAspectMode;
import com.linecorp.bot.model.message.flex.component.Image.ImageAspectRatio;
import com.linecorp.bot.model.message.flex.component.Image.ImageSize;
import com.linecorp.bot.model.message.flex.component.Separator;
import com.linecorp.bot.model.message.flex.component.Spacer;
import com.linecorp.bot.model.message.flex.component.Text;
import com.linecorp.bot.model.message.flex.component.Text.TextWeight;
import com.linecorp.bot.model.message.flex.container.Bubble;
import com.linecorp.bot.model.message.flex.unit.FlexFontSize;
import com.linecorp.bot.model.message.flex.unit.FlexLayout;
import com.linecorp.bot.model.message.flex.unit.FlexMarginSize;

public class ExampleFlexMessageSupplier implements Supplier<FlexMessage> {
    @Override
    public FlexMessage get() {
        final Image heroBlock =
                Image.builder()
                     .url("https://example.com/cafe.jpg")
                     .size(ImageSize.FULL_WIDTH)
                     .aspectRatio(ImageAspectRatio.R20TO13)
                     .aspectMode(ImageAspectMode.Cover)
                     .action(new URIAction("label", "http://example.com"))
                     .build();

        final Box bodyBlock;
        {
            final Text title =
                    Text.builder().text("Brown Cafe").weight(TextWeight.BOLD).size(FlexFontSize.XL).build();

            final Box review;
            {
                final Icon goldStar =
                        Icon.builder().size(FlexFontSize.SM).url("https://example.com/gold_star.png").build();
                final Icon grayStar =
                        Icon.builder().size(FlexFontSize.SM).url("https://example.com/gray_star.png").build();
                final Text point =
                        Text.builder()
                            .text("4.0")
                            .size(FlexFontSize.SM)
                            .color("#999999")
                            .margin(FlexMarginSize.MD)
                            .flex(0)
                            .build();

                review = Box.builder()
                            .layout(FlexLayout.BASELINE)
                            .margin(FlexMarginSize.MD)
                            .contents(Arrays.asList(goldStar, goldStar, goldStar, goldStar, grayStar, point))
                            .build();
            }

            final Box info;
            {
                final Box place =
                        Box.builder()
                           .layout(FlexLayout.BASELINE)
                           .spacing(FlexMarginSize.SM)
                           .contents(
                                   Arrays.asList(
                                           Text.builder()
                                               .text("Place")
                                               .color("#aaaaaa")
                                               .size(FlexFontSize.SM)
                                               .flex(1)
                                               .build(),
                                           Text.builder()
                                               .text("Shinjuku, Tokyo")
                                               .wrap(true)
                                               .color("#666666")
                                               .size(FlexFontSize.SM)
                                               .flex(5)
                                               .build()
                                   )
                           )
                           .build();
                final Box time =
                        Box.builder()
                           .layout(FlexLayout.BASELINE)
                           .spacing(FlexMarginSize.SM)
                           .contents(
                                   Arrays.asList(
                                           Text.builder()
                                               .text("Time")
                                               .color("#aaaaaa")
                                               .size(FlexFontSize.SM)
                                               .flex(1)
                                               .build(),
                                           Text.builder()
                                               .text("10:00 - 23:00")
                                               .wrap(true)
                                               .color("#666666")
                                               .size(FlexFontSize.SM)
                                               .flex(5)
                                               .build()
                                   )
                           )
                           .build();

                info = Box.builder()
                          .layout(FlexLayout.VERTICAL)
                          .margin(FlexMarginSize.LG)
                          .spacing(FlexMarginSize.SM)
                          .contents(Arrays.asList(place, time))
                          .build();
            }

            bodyBlock = Box.builder()
                           .layout(FlexLayout.VERTICAL)
                           .contents(Arrays.asList(title, review, info))
                           .build();
        }

        final Box footerBlock;
        {
            final Spacer spacer = Spacer.builder().size(FlexMarginSize.SM).build();
            final Button callAction =
                    Button.builder()
                          .style(ButtonStyle.LINK)
                          .height(ButtonHeight.SMALL)
                          .action(new URIAction("CALL", "tel:000000"))
                          .build();
            final Separator separator = Separator.builder().build();
            final Button websiteAction =
                    Button.builder()
                          .style(ButtonStyle.LINK)
                          .height(ButtonHeight.SMALL)
                          .action(new URIAction("WEBSITE", "https://example.com"))
                          .build();

            footerBlock = Box.builder()
                             .layout(FlexLayout.VERTICAL)
                             .spacing(FlexMarginSize.SM)
                             .contents(Arrays.asList(spacer, callAction, separator, websiteAction))
                             .build();
        }

        final Bubble bubble = Bubble.builder().hero(heroBlock).body(bodyBlock).footer(footerBlock).build();

        return new FlexMessage("ALT", bubble);
    }
}
